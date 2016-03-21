#
#Start firewall
#
 # USER CHAINS
 #
  source $LAN_CHAIN_FILE
  source $ADMIN_CHAIN_FILE
  source $SECONDARY_CHAIN_FILE
  source 'chains/ftp'
 
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

 # Connections to Master Server 
 #

  # FTP
    $IPTABLES -t nat -A PREROUTING -p tcp -i $INTERNAL_INTERFACE -d $INTERNAL_IP --dport 20:21 -j ftp
    $IPTABLES -t nat -A PREROUTING -p udp -i $INTERNAL_INTERFACE -d $INTERNAL_IP --dport 20:21 -j ftp

  # POP3s
    $IPTABLES -t nat -A PREROUTING -p tcp -i $INTERNAL_INTERFACE -d $INTERNAL_IP --dport 995 -j ACCEPT
    $IPTABLES -t nat -A PREROUTING -p udp -i $INTERNAL_INTERFACE -d $INTERNAL_IP --dport 995 -j ACCEPT

  # SSH
   $IPTABLES -t nat -A PREROUTING -p tcp -i $INTERNAL_INTERFACE -d $INTERNAL_IP --dport 22 -j admin

  # DNS
   $IPTABLES -t nat -A PREROUTING -p tcp -i $INTERNAL_INTERFACE -s 0.0.0.0/0 --dport 53 -j ACCEPT
   $IPTABLES -t nat -A PREROUTING -p udp -i $INTERNAL_INTERFACE -s 0.0.0.0/0 --dport 53 -j ACCEPT

  # WWW
   $IPTABLES -t nat -A PREROUTING -p tcp -i $INTERNAL_INTERFACE -s 0.0.0.0/0 --dport 80 -j ACCEPT
   $IPTABLES -t nat -A PREROUTING -p tcp -i $INTERNAL_INTERFACE -s 0.0.0.0/0 --dport 8080 -j ACCEPT
   $IPTABLES -t nat -A PREROUTING -p tcp -i $INTERNAL_INTERFACE -s 0.0.0.0/0 --dport 12345 -j secondary

  # WINS/SMB 
   $IPTABLES -t nat -A PREROUTING -p tcp -i $INTERNAL_INTERFACE -s $LOCAL_NETWORK_ADDRESS -d $INTERNAL_IP -m multiport --dports 139,445 -j lan
   $IPTABLES -t nat -A PREROUTING -p udp -i $INTERNAL_INTERFACE -m multiport --dports 137,138 -j lan
   $IPTABLES -t nat -A PREROUTING -p udp -s $LOCAL_NETWORK_ADDRESS -d 255.255.255.255/32 --dport 137 -j ACCEPT

  # HUB DC
   $IPTABLES -t nat -A PREROUTING -p tcp -i $INTERNAL_INTERFACE -s $LOCAL_NETWORK_ADDRESS -d $INTERNAL_IP --dport 411 -j lan

  # WWWS
   $IPTABLES -t nat -A PREROUTING -p tcp -i $INTERNAL_INTERFACE -s 0.0.0.0/0 -d $INTERNAL_IP --dport 443 -j ACCEPT

  # IRC server
   $IPTABLES -t nat -A PREROUTING -p tcp -i $INTERNAL_INTERFACE -s 0.0.0.0/0 -d $INTERNAL_IP --dport 6667 -j lan

  # Ident
  #$IPTABLES -t nat -A PREROUTING -p tcp -i $INTERNAL_INTERFACE -s 0.0.0.0/0 -d $INTERNAL_IP --dport 113 -j lan
  #$IPTABLES -t nat -A PREROUTING -p tcp -i $INTERNAL_INTERFACE -s 0.0.0.0/0 -d $INTERNAL_IP --dport 113 -j ACCEPT
	
  # other
   $IPTABLES -t nat -A PREROUTING -s 0.0.0.0/0 -d $INTERNAL_IP -j DROP
