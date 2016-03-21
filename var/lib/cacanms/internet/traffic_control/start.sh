### main
# in
$TC qdisc add dev $INTERNAL_INTERFACE root handle 1: htb
 $TC class add dev $INTERNAL_INTERFACE parent 1: classid 1:0 htb rate 4096kbit ceil 4096kbit 
  $TC filter add dev $INTERNAL_INTERFACE protocol ip parent 1:0 handle 1 fw flowid 1:1
  $TC filter add dev $INTERNAL_INTERFACE protocol ip parent 1:0 handle 2 fw classid 1:2
# out
$TC qdisc add dev $EXTERNAL_INTERFACE root handle 1: htb
 $TC class add dev $EXTERNAL_INTERFACE parent 1: classid 1:0 htb rate 4096kbit ceil 4096kbit 
  $TC filter add dev $EXTERNAL_INTERFACE protocol ip parent 1: handle 1 fw classid 1:1
  $TC filter add dev $EXTERNAL_INTERFACE protocol ip parent 1: handle 2 fw classid 1:2

### for each link
# in
$TC class add dev $INTERNAL_INTERFACE parent 1:0 classid 1:1 htb rate 1800kbit ceil 1800kbit 
  $TC filter add dev $INTERNAL_INTERFACE protocol ip parent 1:1 u32 match ip src 0.0.0.0/0 classid 1:11
$TC class add dev $INTERNAL_INTERFACE parent 1:0 classid 1:2 htb rate 1800kbit ceil 1800kbit 
  $TC filter add dev $INTERNAL_INTERFACE protocol ip parent 1:2 u32 match ip src 0.0.0.0/0 classid 1:21

# out
$TC class add dev $EXTERNAL_INTERFACE parent 1:0 classid 1:1 htb rate 230kbit ceil 230kbit 
  $TC filter add dev $EXTERNAL_INTERFACE protocol ip parent 1:1 u32 match ip src 0.0.0.0/0 classid 1:11
$TC class add dev $EXTERNAL_INTERFACE parent 1:0 classid 1:2 htb rate 230kbit ceil 230kbit 
  $TC filter add dev $EXTERNAL_INTERFACE protocol ip parent 1:2 u32 match ip src 0.0.0.0/0 classid 1:21

### for each host

source $TRAFFIC_CONTROL_FILE
