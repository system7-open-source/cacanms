#
#Stop firewall
#
 $IPTABLES -F
 $IPTABLES -t nat -F
 $IPTABLES -t mangle -F
 $IPTABLES -P INPUT ACCEPT
 $IPTABLES -P FORWARD ACCEPT
 $IPTABLES -P OUTPUT ACCEPT
 $IPTABLES -t nat -P PREROUTING ACCEPT
 $IPTABLES -t nat -P POSTROUTING ACCEPT
 $IPTABLES -t nat -X
 $IPTABLES -t mangle -X
