#!/bin/sh

source 'config'

i=0

while [ -f $FIREWALL_SEMAPHORE ]
do
 i=`expr $i + 1`
 echo -e "\rAltering the firewall state blocked by semaphore. Waiting: $i s\c">&2
 sleep 1 
done
touch $FIREWALL_SEMAPHORE
echo -e "\n"

case "$1" in
 #
 #Start firewall
 #
 start)
  source 'start.sh'
  ;;

 #
 #Stop firewall
 #
 stop)
  source 'stop.sh'
  ;;
 
 #
 #Re(start|load) firewall
 #
 restart|reload)
  source 'stop.sh'
  source 'start.sh'
  ;;

 #
 #Help
 #
 *)
  echo "Usage: run.sh {start|restart|reload|stop}"
  exit 1
  ;;
esac

if [ -f $FIREWALL_SEMAPHORE ]
then rm -rf $FIREWALL_SEMAPHORE
fi
