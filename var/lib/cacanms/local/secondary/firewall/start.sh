#
#Start firewall
#
 # ! APOC
  #APOC_IP=`tail -2 /var/log/apoc_ip.log|grep \.|gawk '{ print $2 }'`
  #$IPTABLES -t nat -A PREROUTING -p tcp -s $APOC_IP -i $INTERNAL_INTERFACE --dport 22 -j ACCEPT
  #$IPTABLES -t nat -A PREROUTING -p tcp -s $APOC_IP -i $INTERNAL_INTERFACE --dport 411 -j ACCEPT
  #$IPTABLES -t nat -A PREROUTING -p tcp -s $APOC_IP -i $INTERNAL_INTERFACE --dport 8080 -j ACCEPT
  #$IPTABLES -t nat -A PREROUTING -p icmp -i $INTERNAL_INTERFACE -s $APOC_IP --icmp-type echo-request -j ACCEPT
  #$IPTABLES -t mangle -A INPUT -p icmp -s $APOC_IP -d $INTERNAL_IP --icmp-type echo-request -j MARK --set-mark 0xfedc
 # USER CHAINS
 #
  source $LAN_CHAIN_FILE
  source $ADMIN_CHAIN_FILE
  source $SECONDARY_CHAIN_FILE
  source "chains/ftp"
 
 # General policies
  $IPTABLES -P FORWARD DROP
  $IPTABLES -t nat -P PREROUTING DROP

 # Blocking invalid datagrams
   $IPTABLES -m state -A INPUT --state INVALID -j DROP
   $IPTABLES -m state -A FORWARD --state INVALID -j DROP


 # incoming from lan to DHCP
 #
  $IPTABLES -t nat -A PREROUTING -p udp -i $INTERNAL_INTERFACE -s 0.0.0.0/32 -d 255.255.255.255/32 --sport 67 --dport 67 -j ACCEPT
  $IPTABLES -t nat -A PREROUTING -p udp -i $INTERNAL_INTERFACE -d $INTERNAL_IP --sport 67 --dport 67 -j ACCEPT

  
 # blocking spoofers
 #
  $IPTABLES -A INPUT -i $INTERNAL_INTERFACE -s 172.16.0.0/12 -d 0.0.0.0/0 -j DROP
  $IPTABLES -A INPUT -i $INTERNAL_INTERFACE -s 192.168.0.0/16 -d 0.0.0.0/0 -j DROP

 # Connections to this Server 
 #

  # FTP
    $IPTABLES -t nat -A PREROUTING -p tcp -i $INTERNAL_INTERFACE -d $INTERNAL_IP --dport 20:21 -j ftp
    $IPTABLES -t nat -A PREROUTING -p udp -i $INTERNAL_INTERFACE -d $INTERNAL_IP --dport 20:21 -j ftp
  
  # SSH
   $IPTABLES -t nat -A PREROUTING -p tcp -i $INTERNAL_INTERFACE -d $INTERNAL_IP --dport 22 -j admin

  # DNS
   $IPTABLES -t nat -A PREROUTING -p tcp -i $INTERNAL_INTERFACE -s 0.0.0.0/0 --dport 53 -j ACCEPT
   $IPTABLES -t nat -A PREROUTING -p udp -i $INTERNAL_INTERFACE -s 0.0.0.0/0 --dport 53 -j ACCEPT

  # WINS/SMB 
   $IPTABLES -t nat -A PREROUTING -p tcp -i $INTERNAL_INTERFACE -s $LOCAL_NETWORK_ADDRESS -d $INTERNAL_IP -m multiport --dports 139,445 -j lan
   $IPTABLES -t nat -A PREROUTING -p udp -i $INTERNAL_INTERFACE -m multiport --dports 137,138 -j lan
   $IPTABLES -t nat -A PREROUTING -p udp -s $LOCAL_NETWORK_ADDRESS -d 255.255.255.255/32 --dport 137 -j ACCEPT

  # other
   $IPTABLES -t nat -A PREROUTING -s $LOCAL_NETWORK_ADDRESS -p icmp -m icmp --icmp-type 3 -j lan
   $IPTABLES -t nat -A PREROUTING -s $LOCAL_NETWORK_ADDRESS -p icmp -m icmp --icmp-type 8 -j lan
   # opendchub
   $IPTABLES -t nat -A PREROUTING -p tcp -i $INTERNAL_INTERFACE -m multiport --dports 411 -j lan
