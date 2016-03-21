#!/bin/sh

source 'config'

i=0

while [ -f $TRAFFIC_CONTROL_SEMAPHORE ]
do
 i=`expr $i + 1`
 echo -e "\rAltering traffic control subsystem state blocked by semaphore. Waiting: $i s\c">&2
 sleep 1 
done
touch $TRAFFIC_CONTROL_SEMAPHORE
echo -e "\n"

case "$1" in
 #
 #Start traffic control subsystem
 #
 start)
  source 'start.sh'
  ;;

 #
 #Stop traffic control subsystem
 #
 stop)
  source 'stop.sh'
  ;;
 
 #
 #Re(start|load) traffic control subsystem
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

if [ -f $TRAFFIC_CONTROL_SEMAPHORE ]
then rm -rf $TRAFFIC_CONTROL_SEMAPHORE
fi
