# host: abyss (link: dsl1)
$TC class add dev eth0 parent 1:1 classid 1:103 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:103 classid 1:104 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:104 handle 104 sfq perturb 10
 $TC class add dev eth0 parent 1:103 classid 1:105 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:105 handle 105 sfq perturb 10
$TC class add dev eth1 parent 1:1 classid 1:103 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:103 classid 1:104 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:104 handle 104 sfq perturb 10
 $TC class add dev eth1 parent 1:103 classid 1:105 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:105 handle 105 sfq perturb 10
# host: abyss (link: dsl2)
$TC class add dev eth0 parent 1:2 classid 1:106 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:106 classid 1:107 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:107 handle 107 sfq perturb 10
 $TC class add dev eth0 parent 1:106 classid 1:108 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:108 handle 108 sfq perturb 10
$TC class add dev eth1 parent 1:2 classid 1:106 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:106 classid 1:107 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:107 handle 107 sfq perturb 10
 $TC class add dev eth1 parent 1:106 classid 1:108 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:108 handle 108 sfq perturb 10
# host: adam (link: dsl1)
$TC class add dev eth0 parent 1:1 classid 1:109 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:109 classid 1:110 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:110 handle 110 sfq perturb 10
 $TC class add dev eth0 parent 1:109 classid 1:111 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:111 handle 111 sfq perturb 10
$TC class add dev eth1 parent 1:1 classid 1:109 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:109 classid 1:110 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:110 handle 110 sfq perturb 10
 $TC class add dev eth1 parent 1:109 classid 1:111 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:111 handle 111 sfq perturb 10
# host: adam (link: dsl2)
$TC class add dev eth0 parent 1:2 classid 1:112 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:112 classid 1:113 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:113 handle 113 sfq perturb 10
 $TC class add dev eth0 parent 1:112 classid 1:114 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:114 handle 114 sfq perturb 10
$TC class add dev eth1 parent 1:2 classid 1:112 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:112 classid 1:113 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:113 handle 113 sfq perturb 10
 $TC class add dev eth1 parent 1:112 classid 1:114 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:114 handle 114 sfq perturb 10
# host: adul (link: dsl1)
$TC class add dev eth0 parent 1:1 classid 1:115 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:115 classid 1:116 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:116 handle 116 sfq perturb 10
 $TC class add dev eth0 parent 1:115 classid 1:117 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:117 handle 117 sfq perturb 10
$TC class add dev eth1 parent 1:1 classid 1:115 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:115 classid 1:116 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:116 handle 116 sfq perturb 10
 $TC class add dev eth1 parent 1:115 classid 1:117 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:117 handle 117 sfq perturb 10
# host: adul (link: dsl2)
$TC class add dev eth0 parent 1:2 classid 1:118 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:118 classid 1:119 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:119 handle 119 sfq perturb 10
 $TC class add dev eth0 parent 1:118 classid 1:120 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:120 handle 120 sfq perturb 10
$TC class add dev eth1 parent 1:2 classid 1:118 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:118 classid 1:119 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:119 handle 119 sfq perturb 10
 $TC class add dev eth1 parent 1:118 classid 1:120 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:120 handle 120 sfq perturb 10
# host: agnieszka (link: dsl1)
$TC class add dev eth0 parent 1:1 classid 1:121 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:121 classid 1:122 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:122 handle 122 sfq perturb 10
 $TC class add dev eth0 parent 1:121 classid 1:123 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:123 handle 123 sfq perturb 10
$TC class add dev eth1 parent 1:1 classid 1:121 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:121 classid 1:122 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:122 handle 122 sfq perturb 10
 $TC class add dev eth1 parent 1:121 classid 1:123 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:123 handle 123 sfq perturb 10
# host: agnieszka (link: dsl2)
$TC class add dev eth0 parent 1:2 classid 1:124 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:124 classid 1:125 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:125 handle 125 sfq perturb 10
 $TC class add dev eth0 parent 1:124 classid 1:126 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:126 handle 126 sfq perturb 10
$TC class add dev eth1 parent 1:2 classid 1:124 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:124 classid 1:125 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:125 handle 125 sfq perturb 10
 $TC class add dev eth1 parent 1:124 classid 1:126 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:126 handle 126 sfq perturb 10
# host: andromeda (link: dsl1)
$TC class add dev eth0 parent 1:1 classid 1:127 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:127 classid 1:128 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:128 handle 128 sfq perturb 10
 $TC class add dev eth0 parent 1:127 classid 1:129 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:129 handle 129 sfq perturb 10
$TC class add dev eth1 parent 1:1 classid 1:127 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:127 classid 1:128 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:128 handle 128 sfq perturb 10
 $TC class add dev eth1 parent 1:127 classid 1:129 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:129 handle 129 sfq perturb 10
# host: andromeda (link: dsl2)
$TC class add dev eth0 parent 1:2 classid 1:130 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:130 classid 1:131 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:131 handle 131 sfq perturb 10
 $TC class add dev eth0 parent 1:130 classid 1:132 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:132 handle 132 sfq perturb 10
$TC class add dev eth1 parent 1:2 classid 1:130 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:130 classid 1:131 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:131 handle 131 sfq perturb 10
 $TC class add dev eth1 parent 1:130 classid 1:132 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:132 handle 132 sfq perturb 10
# host: anka (link: dsl1)
$TC class add dev eth0 parent 1:1 classid 1:133 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:133 classid 1:134 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:134 handle 134 sfq perturb 10
 $TC class add dev eth0 parent 1:133 classid 1:135 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:135 handle 135 sfq perturb 10
$TC class add dev eth1 parent 1:1 classid 1:133 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:133 classid 1:134 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:134 handle 134 sfq perturb 10
 $TC class add dev eth1 parent 1:133 classid 1:135 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:135 handle 135 sfq perturb 10
# host: anka (link: dsl2)
$TC class add dev eth0 parent 1:2 classid 1:136 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:136 classid 1:137 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:137 handle 137 sfq perturb 10
 $TC class add dev eth0 parent 1:136 classid 1:138 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:138 handle 138 sfq perturb 10
$TC class add dev eth1 parent 1:2 classid 1:136 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:136 classid 1:137 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:137 handle 137 sfq perturb 10
 $TC class add dev eth1 parent 1:136 classid 1:138 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:138 handle 138 sfq perturb 10
# host: anton (link: dsl1)
$TC class add dev eth0 parent 1:1 classid 1:139 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:139 classid 1:140 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:140 handle 140 sfq perturb 10
 $TC class add dev eth0 parent 1:139 classid 1:141 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:141 handle 141 sfq perturb 10
$TC class add dev eth1 parent 1:1 classid 1:139 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:139 classid 1:140 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:140 handle 140 sfq perturb 10
 $TC class add dev eth1 parent 1:139 classid 1:141 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:141 handle 141 sfq perturb 10
# host: anton (link: dsl2)
$TC class add dev eth0 parent 1:2 classid 1:142 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:142 classid 1:143 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:143 handle 143 sfq perturb 10
 $TC class add dev eth0 parent 1:142 classid 1:144 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:144 handle 144 sfq perturb 10
$TC class add dev eth1 parent 1:2 classid 1:142 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:142 classid 1:143 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:143 handle 143 sfq perturb 10
 $TC class add dev eth1 parent 1:142 classid 1:144 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:144 handle 144 sfq perturb 10
# host: arek2 (link: dsl1)
$TC class add dev eth0 parent 1:1 classid 1:145 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:145 classid 1:146 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:146 handle 146 sfq perturb 10
 $TC class add dev eth0 parent 1:145 classid 1:147 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:147 handle 147 sfq perturb 10
$TC class add dev eth1 parent 1:1 classid 1:145 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:145 classid 1:146 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:146 handle 146 sfq perturb 10
 $TC class add dev eth1 parent 1:145 classid 1:147 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:147 handle 147 sfq perturb 10
# host: arek2 (link: dsl2)
$TC class add dev eth0 parent 1:2 classid 1:148 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:148 classid 1:149 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:149 handle 149 sfq perturb 10
 $TC class add dev eth0 parent 1:148 classid 1:150 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:150 handle 150 sfq perturb 10
$TC class add dev eth1 parent 1:2 classid 1:148 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:148 classid 1:149 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:149 handle 149 sfq perturb 10
 $TC class add dev eth1 parent 1:148 classid 1:150 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:150 handle 150 sfq perturb 10
# host: asia (link: dsl1)
$TC class add dev eth0 parent 1:1 classid 1:151 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:151 classid 1:152 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:152 handle 152 sfq perturb 10
 $TC class add dev eth0 parent 1:151 classid 1:153 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:153 handle 153 sfq perturb 10
$TC class add dev eth1 parent 1:1 classid 1:151 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:151 classid 1:152 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:152 handle 152 sfq perturb 10
 $TC class add dev eth1 parent 1:151 classid 1:153 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:153 handle 153 sfq perturb 10
# host: asia (link: dsl2)
$TC class add dev eth0 parent 1:2 classid 1:154 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:154 classid 1:155 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:155 handle 155 sfq perturb 10
 $TC class add dev eth0 parent 1:154 classid 1:156 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:156 handle 156 sfq perturb 10
$TC class add dev eth1 parent 1:2 classid 1:154 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:154 classid 1:155 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:155 handle 155 sfq perturb 10
 $TC class add dev eth1 parent 1:154 classid 1:156 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:156 handle 156 sfq perturb 10
# host: aska (link: dsl1)
$TC class add dev eth0 parent 1:1 classid 1:157 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:157 classid 1:158 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:158 handle 158 sfq perturb 10
 $TC class add dev eth0 parent 1:157 classid 1:159 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:159 handle 159 sfq perturb 10
$TC class add dev eth1 parent 1:1 classid 1:157 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:157 classid 1:158 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:158 handle 158 sfq perturb 10
 $TC class add dev eth1 parent 1:157 classid 1:159 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:159 handle 159 sfq perturb 10
# host: aska (link: dsl2)
$TC class add dev eth0 parent 1:2 classid 1:160 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:160 classid 1:161 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:161 handle 161 sfq perturb 10
 $TC class add dev eth0 parent 1:160 classid 1:162 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:162 handle 162 sfq perturb 10
$TC class add dev eth1 parent 1:2 classid 1:160 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:160 classid 1:161 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:161 handle 161 sfq perturb 10
 $TC class add dev eth1 parent 1:160 classid 1:162 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:162 handle 162 sfq perturb 10
# host: atener (link: dsl1)
$TC class add dev eth0 parent 1:1 classid 1:163 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:163 classid 1:164 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:164 handle 164 sfq perturb 10
 $TC class add dev eth0 parent 1:163 classid 1:165 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:165 handle 165 sfq perturb 10
$TC class add dev eth1 parent 1:1 classid 1:163 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:163 classid 1:164 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:164 handle 164 sfq perturb 10
 $TC class add dev eth1 parent 1:163 classid 1:165 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:165 handle 165 sfq perturb 10
# host: atener (link: dsl2)
$TC class add dev eth0 parent 1:2 classid 1:166 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:166 classid 1:167 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:167 handle 167 sfq perturb 10
 $TC class add dev eth0 parent 1:166 classid 1:168 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:168 handle 168 sfq perturb 10
$TC class add dev eth1 parent 1:2 classid 1:166 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:166 classid 1:167 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:167 handle 167 sfq perturb 10
 $TC class add dev eth1 parent 1:166 classid 1:168 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:168 handle 168 sfq perturb 10
# host: bagzi (link: dsl1)
$TC class add dev eth0 parent 1:1 classid 1:169 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:169 classid 1:170 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:170 handle 170 sfq perturb 10
 $TC class add dev eth0 parent 1:169 classid 1:171 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:171 handle 171 sfq perturb 10
$TC class add dev eth1 parent 1:1 classid 1:169 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:169 classid 1:170 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:170 handle 170 sfq perturb 10
 $TC class add dev eth1 parent 1:169 classid 1:171 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:171 handle 171 sfq perturb 10
# host: bagzi (link: dsl2)
$TC class add dev eth0 parent 1:2 classid 1:172 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:172 classid 1:173 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:173 handle 173 sfq perturb 10
 $TC class add dev eth0 parent 1:172 classid 1:174 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:174 handle 174 sfq perturb 10
$TC class add dev eth1 parent 1:2 classid 1:172 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:172 classid 1:173 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:173 handle 173 sfq perturb 10
 $TC class add dev eth1 parent 1:172 classid 1:174 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:174 handle 174 sfq perturb 10
# host: basia (link: dsl1)
$TC class add dev eth0 parent 1:1 classid 1:175 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:175 classid 1:176 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:176 handle 176 sfq perturb 10
 $TC class add dev eth0 parent 1:175 classid 1:177 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:177 handle 177 sfq perturb 10
$TC class add dev eth1 parent 1:1 classid 1:175 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:175 classid 1:176 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:176 handle 176 sfq perturb 10
 $TC class add dev eth1 parent 1:175 classid 1:177 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:177 handle 177 sfq perturb 10
# host: basia (link: dsl2)
$TC class add dev eth0 parent 1:2 classid 1:178 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:178 classid 1:179 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:179 handle 179 sfq perturb 10
 $TC class add dev eth0 parent 1:178 classid 1:180 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:180 handle 180 sfq perturb 10
$TC class add dev eth1 parent 1:2 classid 1:178 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:178 classid 1:179 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:179 handle 179 sfq perturb 10
 $TC class add dev eth1 parent 1:178 classid 1:180 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:180 handle 180 sfq perturb 10
# host: basta (link: dsl1)
$TC class add dev eth0 parent 1:1 classid 1:181 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:181 classid 1:182 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:182 handle 182 sfq perturb 10
 $TC class add dev eth0 parent 1:181 classid 1:183 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:183 handle 183 sfq perturb 10
$TC class add dev eth1 parent 1:1 classid 1:181 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:181 classid 1:182 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:182 handle 182 sfq perturb 10
 $TC class add dev eth1 parent 1:181 classid 1:183 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:183 handle 183 sfq perturb 10
# host: basta (link: dsl2)
$TC class add dev eth0 parent 1:2 classid 1:184 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:184 classid 1:185 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:185 handle 185 sfq perturb 10
 $TC class add dev eth0 parent 1:184 classid 1:186 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:186 handle 186 sfq perturb 10
$TC class add dev eth1 parent 1:2 classid 1:184 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:184 classid 1:185 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:185 handle 185 sfq perturb 10
 $TC class add dev eth1 parent 1:184 classid 1:186 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:186 handle 186 sfq perturb 10
# host: batoon (link: dsl1)
$TC class add dev eth0 parent 1:1 classid 1:187 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:187 classid 1:188 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:188 handle 188 sfq perturb 10
 $TC class add dev eth0 parent 1:187 classid 1:189 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:189 handle 189 sfq perturb 10
$TC class add dev eth1 parent 1:1 classid 1:187 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:187 classid 1:188 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:188 handle 188 sfq perturb 10
 $TC class add dev eth1 parent 1:187 classid 1:189 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:189 handle 189 sfq perturb 10
# host: batoon (link: dsl2)
$TC class add dev eth0 parent 1:2 classid 1:190 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:190 classid 1:191 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:191 handle 191 sfq perturb 10
 $TC class add dev eth0 parent 1:190 classid 1:192 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:192 handle 192 sfq perturb 10
$TC class add dev eth1 parent 1:2 classid 1:190 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:190 classid 1:191 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:191 handle 191 sfq perturb 10
 $TC class add dev eth1 parent 1:190 classid 1:192 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:192 handle 192 sfq perturb 10
# host: beata (link: dsl1)
$TC class add dev eth0 parent 1:1 classid 1:193 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:193 classid 1:194 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:194 handle 194 sfq perturb 10
 $TC class add dev eth0 parent 1:193 classid 1:195 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:195 handle 195 sfq perturb 10
$TC class add dev eth1 parent 1:1 classid 1:193 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:193 classid 1:194 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:194 handle 194 sfq perturb 10
 $TC class add dev eth1 parent 1:193 classid 1:195 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:195 handle 195 sfq perturb 10
# host: beata (link: dsl2)
$TC class add dev eth0 parent 1:2 classid 1:196 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:196 classid 1:197 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:197 handle 197 sfq perturb 10
 $TC class add dev eth0 parent 1:196 classid 1:198 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:198 handle 198 sfq perturb 10
$TC class add dev eth1 parent 1:2 classid 1:196 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:196 classid 1:197 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:197 handle 197 sfq perturb 10
 $TC class add dev eth1 parent 1:196 classid 1:198 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:198 handle 198 sfq perturb 10
# host: beta (link: dsl1)
$TC class add dev eth0 parent 1:1 classid 1:199 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:199 classid 1:200 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:200 handle 200 sfq perturb 10
 $TC class add dev eth0 parent 1:199 classid 1:201 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:201 handle 201 sfq perturb 10
$TC class add dev eth1 parent 1:1 classid 1:199 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:199 classid 1:200 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:200 handle 200 sfq perturb 10
 $TC class add dev eth1 parent 1:199 classid 1:201 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:201 handle 201 sfq perturb 10
# host: beta (link: dsl2)
$TC class add dev eth0 parent 1:2 classid 1:202 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:202 classid 1:203 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:203 handle 203 sfq perturb 10
 $TC class add dev eth0 parent 1:202 classid 1:204 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:204 handle 204 sfq perturb 10
$TC class add dev eth1 parent 1:2 classid 1:202 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:202 classid 1:203 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:203 handle 203 sfq perturb 10
 $TC class add dev eth1 parent 1:202 classid 1:204 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:204 handle 204 sfq perturb 10
# host: bettipeter (link: dsl1)
$TC class add dev eth0 parent 1:1 classid 1:205 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:205 classid 1:206 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:206 handle 206 sfq perturb 10
 $TC class add dev eth0 parent 1:205 classid 1:207 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:207 handle 207 sfq perturb 10
$TC class add dev eth1 parent 1:1 classid 1:205 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:205 classid 1:206 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:206 handle 206 sfq perturb 10
 $TC class add dev eth1 parent 1:205 classid 1:207 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:207 handle 207 sfq perturb 10
# host: bettipeter (link: dsl2)
$TC class add dev eth0 parent 1:2 classid 1:208 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:208 classid 1:209 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:209 handle 209 sfq perturb 10
 $TC class add dev eth0 parent 1:208 classid 1:210 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:210 handle 210 sfq perturb 10
$TC class add dev eth1 parent 1:2 classid 1:208 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:208 classid 1:209 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:209 handle 209 sfq perturb 10
 $TC class add dev eth1 parent 1:208 classid 1:210 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:210 handle 210 sfq perturb 10
# host: bilbo (link: dsl1)
$TC class add dev eth0 parent 1:1 classid 1:211 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:211 classid 1:212 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:212 handle 212 sfq perturb 10
 $TC class add dev eth0 parent 1:211 classid 1:213 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:213 handle 213 sfq perturb 10
$TC class add dev eth1 parent 1:1 classid 1:211 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:211 classid 1:212 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:212 handle 212 sfq perturb 10
 $TC class add dev eth1 parent 1:211 classid 1:213 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:213 handle 213 sfq perturb 10
# host: bilbo (link: dsl2)
$TC class add dev eth0 parent 1:2 classid 1:214 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:214 classid 1:215 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:215 handle 215 sfq perturb 10
 $TC class add dev eth0 parent 1:214 classid 1:216 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:216 handle 216 sfq perturb 10
$TC class add dev eth1 parent 1:2 classid 1:214 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:214 classid 1:215 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:215 handle 215 sfq perturb 10
 $TC class add dev eth1 parent 1:214 classid 1:216 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:216 handle 216 sfq perturb 10
# host: blant (link: dsl1)
$TC class add dev eth0 parent 1:1 classid 1:217 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:217 classid 1:218 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:218 handle 218 sfq perturb 10
 $TC class add dev eth0 parent 1:217 classid 1:219 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:219 handle 219 sfq perturb 10
$TC class add dev eth1 parent 1:1 classid 1:217 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:217 classid 1:218 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:218 handle 218 sfq perturb 10
 $TC class add dev eth1 parent 1:217 classid 1:219 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:219 handle 219 sfq perturb 10
# host: blant (link: dsl2)
$TC class add dev eth0 parent 1:2 classid 1:220 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:220 classid 1:221 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:221 handle 221 sfq perturb 10
 $TC class add dev eth0 parent 1:220 classid 1:222 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:222 handle 222 sfq perturb 10
$TC class add dev eth1 parent 1:2 classid 1:220 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:220 classid 1:221 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:221 handle 221 sfq perturb 10
 $TC class add dev eth1 parent 1:220 classid 1:222 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:222 handle 222 sfq perturb 10
# host: blondie (link: dsl1)
$TC class add dev eth0 parent 1:1 classid 1:223 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:223 classid 1:224 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:224 handle 224 sfq perturb 10
 $TC class add dev eth0 parent 1:223 classid 1:225 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:225 handle 225 sfq perturb 10
$TC class add dev eth1 parent 1:1 classid 1:223 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:223 classid 1:224 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:224 handle 224 sfq perturb 10
 $TC class add dev eth1 parent 1:223 classid 1:225 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:225 handle 225 sfq perturb 10
# host: blondie (link: dsl2)
$TC class add dev eth0 parent 1:2 classid 1:226 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:226 classid 1:227 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:227 handle 227 sfq perturb 10
 $TC class add dev eth0 parent 1:226 classid 1:228 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:228 handle 228 sfq perturb 10
$TC class add dev eth1 parent 1:2 classid 1:226 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:226 classid 1:227 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:227 handle 227 sfq perturb 10
 $TC class add dev eth1 parent 1:226 classid 1:228 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:228 handle 228 sfq perturb 10
# host: bonek (link: dsl1)
$TC class add dev eth0 parent 1:1 classid 1:229 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:229 classid 1:230 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:230 handle 230 sfq perturb 10
 $TC class add dev eth0 parent 1:229 classid 1:231 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:231 handle 231 sfq perturb 10
$TC class add dev eth1 parent 1:1 classid 1:229 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:229 classid 1:230 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:230 handle 230 sfq perturb 10
 $TC class add dev eth1 parent 1:229 classid 1:231 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:231 handle 231 sfq perturb 10
# host: bonek (link: dsl2)
$TC class add dev eth0 parent 1:2 classid 1:232 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:232 classid 1:233 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:233 handle 233 sfq perturb 10
 $TC class add dev eth0 parent 1:232 classid 1:234 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:234 handle 234 sfq perturb 10
$TC class add dev eth1 parent 1:2 classid 1:232 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:232 classid 1:233 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:233 handle 233 sfq perturb 10
 $TC class add dev eth1 parent 1:232 classid 1:234 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:234 handle 234 sfq perturb 10
# host: bp (link: dsl1)
$TC class add dev eth0 parent 1:1 classid 1:235 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:235 classid 1:236 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:236 handle 236 sfq perturb 10
 $TC class add dev eth0 parent 1:235 classid 1:237 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:237 handle 237 sfq perturb 10
$TC class add dev eth1 parent 1:1 classid 1:235 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:235 classid 1:236 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:236 handle 236 sfq perturb 10
 $TC class add dev eth1 parent 1:235 classid 1:237 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:237 handle 237 sfq perturb 10
# host: bp (link: dsl2)
$TC class add dev eth0 parent 1:2 classid 1:238 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:238 classid 1:239 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:239 handle 239 sfq perturb 10
 $TC class add dev eth0 parent 1:238 classid 1:240 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:240 handle 240 sfq perturb 10
$TC class add dev eth1 parent 1:2 classid 1:238 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:238 classid 1:239 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:239 handle 239 sfq perturb 10
 $TC class add dev eth1 parent 1:238 classid 1:240 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:240 handle 240 sfq perturb 10
# host: bruno (link: dsl1)
$TC class add dev eth0 parent 1:1 classid 1:241 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:241 classid 1:242 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:242 handle 242 sfq perturb 10
 $TC class add dev eth0 parent 1:241 classid 1:243 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:243 handle 243 sfq perturb 10
$TC class add dev eth1 parent 1:1 classid 1:241 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:241 classid 1:242 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:242 handle 242 sfq perturb 10
 $TC class add dev eth1 parent 1:241 classid 1:243 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:243 handle 243 sfq perturb 10
# host: bruno (link: dsl2)
$TC class add dev eth0 parent 1:2 classid 1:244 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:244 classid 1:245 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:245 handle 245 sfq perturb 10
 $TC class add dev eth0 parent 1:244 classid 1:246 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:246 handle 246 sfq perturb 10
$TC class add dev eth1 parent 1:2 classid 1:244 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:244 classid 1:245 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:245 handle 245 sfq perturb 10
 $TC class add dev eth1 parent 1:244 classid 1:246 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:246 handle 246 sfq perturb 10
# host: buli (link: dsl1)
$TC class add dev eth0 parent 1:1 classid 1:247 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:247 classid 1:248 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:248 handle 248 sfq perturb 10
 $TC class add dev eth0 parent 1:247 classid 1:249 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:249 handle 249 sfq perturb 10
$TC class add dev eth1 parent 1:1 classid 1:247 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:247 classid 1:248 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:248 handle 248 sfq perturb 10
 $TC class add dev eth1 parent 1:247 classid 1:249 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:249 handle 249 sfq perturb 10
# host: buli (link: dsl2)
$TC class add dev eth0 parent 1:2 classid 1:250 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:250 classid 1:251 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:251 handle 251 sfq perturb 10
 $TC class add dev eth0 parent 1:250 classid 1:252 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:252 handle 252 sfq perturb 10
$TC class add dev eth1 parent 1:2 classid 1:250 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:250 classid 1:251 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:251 handle 251 sfq perturb 10
 $TC class add dev eth1 parent 1:250 classid 1:252 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:252 handle 252 sfq perturb 10
# host: cielak (link: dsl1)
$TC class add dev eth0 parent 1:1 classid 1:253 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:253 classid 1:254 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:254 handle 254 sfq perturb 10
 $TC class add dev eth0 parent 1:253 classid 1:255 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:255 handle 255 sfq perturb 10
$TC class add dev eth1 parent 1:1 classid 1:253 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:253 classid 1:254 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:254 handle 254 sfq perturb 10
 $TC class add dev eth1 parent 1:253 classid 1:255 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:255 handle 255 sfq perturb 10
# host: cielak (link: dsl2)
$TC class add dev eth0 parent 1:2 classid 1:256 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:256 classid 1:257 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:257 handle 257 sfq perturb 10
 $TC class add dev eth0 parent 1:256 classid 1:258 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:258 handle 258 sfq perturb 10
$TC class add dev eth1 parent 1:2 classid 1:256 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:256 classid 1:257 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:257 handle 257 sfq perturb 10
 $TC class add dev eth1 parent 1:256 classid 1:258 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:258 handle 258 sfq perturb 10
# host: cobra (link: dsl1)
$TC class add dev eth0 parent 1:1 classid 1:259 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:259 classid 1:260 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:260 handle 260 sfq perturb 10
 $TC class add dev eth0 parent 1:259 classid 1:261 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:261 handle 261 sfq perturb 10
$TC class add dev eth1 parent 1:1 classid 1:259 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:259 classid 1:260 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:260 handle 260 sfq perturb 10
 $TC class add dev eth1 parent 1:259 classid 1:261 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:261 handle 261 sfq perturb 10
# host: cobra (link: dsl2)
$TC class add dev eth0 parent 1:2 classid 1:262 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:262 classid 1:263 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:263 handle 263 sfq perturb 10
 $TC class add dev eth0 parent 1:262 classid 1:264 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:264 handle 264 sfq perturb 10
$TC class add dev eth1 parent 1:2 classid 1:262 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:262 classid 1:263 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:263 handle 263 sfq perturb 10
 $TC class add dev eth1 parent 1:262 classid 1:264 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:264 handle 264 sfq perturb 10
# host: coca-cola (link: dsl1)
$TC class add dev eth0 parent 1:1 classid 1:265 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:265 classid 1:266 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:266 handle 266 sfq perturb 10
 $TC class add dev eth0 parent 1:265 classid 1:267 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:267 handle 267 sfq perturb 10
$TC class add dev eth1 parent 1:1 classid 1:265 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:265 classid 1:266 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:266 handle 266 sfq perturb 10
 $TC class add dev eth1 parent 1:265 classid 1:267 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:267 handle 267 sfq perturb 10
# host: coca-cola (link: dsl2)
$TC class add dev eth0 parent 1:2 classid 1:268 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:268 classid 1:269 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:269 handle 269 sfq perturb 10
 $TC class add dev eth0 parent 1:268 classid 1:270 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:270 handle 270 sfq perturb 10
$TC class add dev eth1 parent 1:2 classid 1:268 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:268 classid 1:269 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:269 handle 269 sfq perturb 10
 $TC class add dev eth1 parent 1:268 classid 1:270 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:270 handle 270 sfq perturb 10
# host: connrad (link: dsl1)
$TC class add dev eth0 parent 1:1 classid 1:271 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:271 classid 1:272 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:272 handle 272 sfq perturb 10
 $TC class add dev eth0 parent 1:271 classid 1:273 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:273 handle 273 sfq perturb 10
$TC class add dev eth1 parent 1:1 classid 1:271 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:271 classid 1:272 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:272 handle 272 sfq perturb 10
 $TC class add dev eth1 parent 1:271 classid 1:273 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:273 handle 273 sfq perturb 10
# host: connrad (link: dsl2)
$TC class add dev eth0 parent 1:2 classid 1:274 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:274 classid 1:275 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:275 handle 275 sfq perturb 10
 $TC class add dev eth0 parent 1:274 classid 1:276 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:276 handle 276 sfq perturb 10
$TC class add dev eth1 parent 1:2 classid 1:274 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:274 classid 1:275 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:275 handle 275 sfq perturb 10
 $TC class add dev eth1 parent 1:274 classid 1:276 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:276 handle 276 sfq perturb 10
# host: d800 (link: dsl1)
$TC class add dev eth0 parent 1:1 classid 1:277 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:277 classid 1:278 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:278 handle 278 sfq perturb 10
 $TC class add dev eth0 parent 1:277 classid 1:279 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:279 handle 279 sfq perturb 10
$TC class add dev eth1 parent 1:1 classid 1:277 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:277 classid 1:278 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:278 handle 278 sfq perturb 10
 $TC class add dev eth1 parent 1:277 classid 1:279 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:279 handle 279 sfq perturb 10
# host: d800 (link: dsl2)
$TC class add dev eth0 parent 1:2 classid 1:280 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:280 classid 1:281 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:281 handle 281 sfq perturb 10
 $TC class add dev eth0 parent 1:280 classid 1:282 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:282 handle 282 sfq perturb 10
$TC class add dev eth1 parent 1:2 classid 1:280 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:280 classid 1:281 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:281 handle 281 sfq perturb 10
 $TC class add dev eth1 parent 1:280 classid 1:282 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:282 handle 282 sfq perturb 10
# host: daniel (link: dsl1)
$TC class add dev eth0 parent 1:1 classid 1:283 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:283 classid 1:284 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:284 handle 284 sfq perturb 10
 $TC class add dev eth0 parent 1:283 classid 1:285 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:285 handle 285 sfq perturb 10
$TC class add dev eth1 parent 1:1 classid 1:283 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:283 classid 1:284 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:284 handle 284 sfq perturb 10
 $TC class add dev eth1 parent 1:283 classid 1:285 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:285 handle 285 sfq perturb 10
# host: daniel (link: dsl2)
$TC class add dev eth0 parent 1:2 classid 1:286 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:286 classid 1:287 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:287 handle 287 sfq perturb 10
 $TC class add dev eth0 parent 1:286 classid 1:288 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:288 handle 288 sfq perturb 10
$TC class add dev eth1 parent 1:2 classid 1:286 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:286 classid 1:287 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:287 handle 287 sfq perturb 10
 $TC class add dev eth1 parent 1:286 classid 1:288 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:288 handle 288 sfq perturb 10
# host: danielu (link: dsl1)
$TC class add dev eth0 parent 1:1 classid 1:289 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:289 classid 1:290 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:290 handle 290 sfq perturb 10
 $TC class add dev eth0 parent 1:289 classid 1:291 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:291 handle 291 sfq perturb 10
$TC class add dev eth1 parent 1:1 classid 1:289 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:289 classid 1:290 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:290 handle 290 sfq perturb 10
 $TC class add dev eth1 parent 1:289 classid 1:291 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:291 handle 291 sfq perturb 10
# host: danielu (link: dsl2)
$TC class add dev eth0 parent 1:2 classid 1:292 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:292 classid 1:293 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:293 handle 293 sfq perturb 10
 $TC class add dev eth0 parent 1:292 classid 1:294 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:294 handle 294 sfq perturb 10
$TC class add dev eth1 parent 1:2 classid 1:292 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:292 classid 1:293 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:293 handle 293 sfq perturb 10
 $TC class add dev eth1 parent 1:292 classid 1:294 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:294 handle 294 sfq perturb 10
# host: daqu (link: dsl1)
$TC class add dev eth0 parent 1:1 classid 1:295 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:295 classid 1:296 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:296 handle 296 sfq perturb 10
 $TC class add dev eth0 parent 1:295 classid 1:297 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:297 handle 297 sfq perturb 10
$TC class add dev eth1 parent 1:1 classid 1:295 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:295 classid 1:296 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:296 handle 296 sfq perturb 10
 $TC class add dev eth1 parent 1:295 classid 1:297 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:297 handle 297 sfq perturb 10
# host: daqu (link: dsl2)
$TC class add dev eth0 parent 1:2 classid 1:298 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:298 classid 1:299 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:299 handle 299 sfq perturb 10
 $TC class add dev eth0 parent 1:298 classid 1:300 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:300 handle 300 sfq perturb 10
$TC class add dev eth1 parent 1:2 classid 1:298 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:298 classid 1:299 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:299 handle 299 sfq perturb 10
 $TC class add dev eth1 parent 1:298 classid 1:300 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:300 handle 300 sfq perturb 10
# host: deck (link: dsl1)
$TC class add dev eth0 parent 1:1 classid 1:301 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:301 classid 1:302 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:302 handle 302 sfq perturb 10
 $TC class add dev eth0 parent 1:301 classid 1:303 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:303 handle 303 sfq perturb 10
$TC class add dev eth1 parent 1:1 classid 1:301 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:301 classid 1:302 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:302 handle 302 sfq perturb 10
 $TC class add dev eth1 parent 1:301 classid 1:303 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:303 handle 303 sfq perturb 10
# host: deck (link: dsl2)
$TC class add dev eth0 parent 1:2 classid 1:304 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:304 classid 1:305 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:305 handle 305 sfq perturb 10
 $TC class add dev eth0 parent 1:304 classid 1:306 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:306 handle 306 sfq perturb 10
$TC class add dev eth1 parent 1:2 classid 1:304 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:304 classid 1:305 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:305 handle 305 sfq perturb 10
 $TC class add dev eth1 parent 1:304 classid 1:306 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:306 handle 306 sfq perturb 10
# host: demek (link: dsl1)
$TC class add dev eth0 parent 1:1 classid 1:307 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:307 classid 1:308 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:308 handle 308 sfq perturb 10
 $TC class add dev eth0 parent 1:307 classid 1:309 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:309 handle 309 sfq perturb 10
$TC class add dev eth1 parent 1:1 classid 1:307 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:307 classid 1:308 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:308 handle 308 sfq perturb 10
 $TC class add dev eth1 parent 1:307 classid 1:309 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:309 handle 309 sfq perturb 10
# host: demek (link: dsl2)
$TC class add dev eth0 parent 1:2 classid 1:310 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:310 classid 1:311 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:311 handle 311 sfq perturb 10
 $TC class add dev eth0 parent 1:310 classid 1:312 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:312 handle 312 sfq perturb 10
$TC class add dev eth1 parent 1:2 classid 1:310 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:310 classid 1:311 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:311 handle 311 sfq perturb 10
 $TC class add dev eth1 parent 1:310 classid 1:312 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:312 handle 312 sfq perturb 10
# host: demostenes (link: dsl1)
$TC class add dev eth0 parent 1:1 classid 1:313 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:313 classid 1:314 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:314 handle 314 sfq perturb 10
 $TC class add dev eth0 parent 1:313 classid 1:315 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:315 handle 315 sfq perturb 10
$TC class add dev eth1 parent 1:1 classid 1:313 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:313 classid 1:314 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:314 handle 314 sfq perturb 10
 $TC class add dev eth1 parent 1:313 classid 1:315 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:315 handle 315 sfq perturb 10
# host: demostenes (link: dsl2)
$TC class add dev eth0 parent 1:2 classid 1:316 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:316 classid 1:317 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:317 handle 317 sfq perturb 10
 $TC class add dev eth0 parent 1:316 classid 1:318 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:318 handle 318 sfq perturb 10
$TC class add dev eth1 parent 1:2 classid 1:316 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:316 classid 1:317 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:317 handle 317 sfq perturb 10
 $TC class add dev eth1 parent 1:316 classid 1:318 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:318 handle 318 sfq perturb 10
# host: domingo (link: dsl1)
$TC class add dev eth0 parent 1:1 classid 1:319 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:319 classid 1:320 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:320 handle 320 sfq perturb 10
 $TC class add dev eth0 parent 1:319 classid 1:321 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:321 handle 321 sfq perturb 10
$TC class add dev eth1 parent 1:1 classid 1:319 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:319 classid 1:320 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:320 handle 320 sfq perturb 10
 $TC class add dev eth1 parent 1:319 classid 1:321 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:321 handle 321 sfq perturb 10
# host: domingo (link: dsl2)
$TC class add dev eth0 parent 1:2 classid 1:322 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:322 classid 1:323 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:323 handle 323 sfq perturb 10
 $TC class add dev eth0 parent 1:322 classid 1:324 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:324 handle 324 sfq perturb 10
$TC class add dev eth1 parent 1:2 classid 1:322 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:322 classid 1:323 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:323 handle 323 sfq perturb 10
 $TC class add dev eth1 parent 1:322 classid 1:324 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:324 handle 324 sfq perturb 10
# host: dorota (link: dsl1)
$TC class add dev eth0 parent 1:1 classid 1:325 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:325 classid 1:326 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:326 handle 326 sfq perturb 10
 $TC class add dev eth0 parent 1:325 classid 1:327 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:327 handle 327 sfq perturb 10
$TC class add dev eth1 parent 1:1 classid 1:325 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:325 classid 1:326 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:326 handle 326 sfq perturb 10
 $TC class add dev eth1 parent 1:325 classid 1:327 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:327 handle 327 sfq perturb 10
# host: dorota (link: dsl2)
$TC class add dev eth0 parent 1:2 classid 1:328 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:328 classid 1:329 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:329 handle 329 sfq perturb 10
 $TC class add dev eth0 parent 1:328 classid 1:330 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:330 handle 330 sfq perturb 10
$TC class add dev eth1 parent 1:2 classid 1:328 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:328 classid 1:329 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:329 handle 329 sfq perturb 10
 $TC class add dev eth1 parent 1:328 classid 1:330 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:330 handle 330 sfq perturb 10
# host: dudeq (link: dsl1)
$TC class add dev eth0 parent 1:1 classid 1:331 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:331 classid 1:332 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:332 handle 332 sfq perturb 10
 $TC class add dev eth0 parent 1:331 classid 1:333 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:333 handle 333 sfq perturb 10
$TC class add dev eth1 parent 1:1 classid 1:331 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:331 classid 1:332 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:332 handle 332 sfq perturb 10
 $TC class add dev eth1 parent 1:331 classid 1:333 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:333 handle 333 sfq perturb 10
# host: dudeq (link: dsl2)
$TC class add dev eth0 parent 1:2 classid 1:334 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:334 classid 1:335 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:335 handle 335 sfq perturb 10
 $TC class add dev eth0 parent 1:334 classid 1:336 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:336 handle 336 sfq perturb 10
$TC class add dev eth1 parent 1:2 classid 1:334 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:334 classid 1:335 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:335 handle 335 sfq perturb 10
 $TC class add dev eth1 parent 1:334 classid 1:336 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:336 handle 336 sfq perturb 10
# host: england (link: dsl1)
$TC class add dev eth0 parent 1:1 classid 1:337 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:337 classid 1:338 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:338 handle 338 sfq perturb 10
 $TC class add dev eth0 parent 1:337 classid 1:339 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:339 handle 339 sfq perturb 10
$TC class add dev eth1 parent 1:1 classid 1:337 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:337 classid 1:338 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:338 handle 338 sfq perturb 10
 $TC class add dev eth1 parent 1:337 classid 1:339 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:339 handle 339 sfq perturb 10
# host: england (link: dsl2)
$TC class add dev eth0 parent 1:2 classid 1:340 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:340 classid 1:341 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:341 handle 341 sfq perturb 10
 $TC class add dev eth0 parent 1:340 classid 1:342 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:342 handle 342 sfq perturb 10
$TC class add dev eth1 parent 1:2 classid 1:340 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:340 classid 1:341 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:341 handle 341 sfq perturb 10
 $TC class add dev eth1 parent 1:340 classid 1:342 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:342 handle 342 sfq perturb 10
# host: ewelka (link: dsl1)
$TC class add dev eth0 parent 1:1 classid 1:343 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:343 classid 1:344 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:344 handle 344 sfq perturb 10
 $TC class add dev eth0 parent 1:343 classid 1:345 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:345 handle 345 sfq perturb 10
$TC class add dev eth1 parent 1:1 classid 1:343 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:343 classid 1:344 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:344 handle 344 sfq perturb 10
 $TC class add dev eth1 parent 1:343 classid 1:345 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:345 handle 345 sfq perturb 10
# host: ewelka (link: dsl2)
$TC class add dev eth0 parent 1:2 classid 1:346 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:346 classid 1:347 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:347 handle 347 sfq perturb 10
 $TC class add dev eth0 parent 1:346 classid 1:348 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:348 handle 348 sfq perturb 10
$TC class add dev eth1 parent 1:2 classid 1:346 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:346 classid 1:347 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:347 handle 347 sfq perturb 10
 $TC class add dev eth1 parent 1:346 classid 1:348 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:348 handle 348 sfq perturb 10
# host: ezechiel (link: dsl1)
$TC class add dev eth0 parent 1:1 classid 1:349 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:349 classid 1:350 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:350 handle 350 sfq perturb 10
 $TC class add dev eth0 parent 1:349 classid 1:351 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:351 handle 351 sfq perturb 10
$TC class add dev eth1 parent 1:1 classid 1:349 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:349 classid 1:350 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:350 handle 350 sfq perturb 10
 $TC class add dev eth1 parent 1:349 classid 1:351 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:351 handle 351 sfq perturb 10
# host: ezechiel (link: dsl2)
$TC class add dev eth0 parent 1:2 classid 1:352 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:352 classid 1:353 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:353 handle 353 sfq perturb 10
 $TC class add dev eth0 parent 1:352 classid 1:354 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:354 handle 354 sfq perturb 10
$TC class add dev eth1 parent 1:2 classid 1:352 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:352 classid 1:353 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:353 handle 353 sfq perturb 10
 $TC class add dev eth1 parent 1:352 classid 1:354 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:354 handle 354 sfq perturb 10
# host: fasolka (link: dsl1)
$TC class add dev eth0 parent 1:1 classid 1:355 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:355 classid 1:356 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:356 handle 356 sfq perturb 10
 $TC class add dev eth0 parent 1:355 classid 1:357 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:357 handle 357 sfq perturb 10
$TC class add dev eth1 parent 1:1 classid 1:355 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:355 classid 1:356 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:356 handle 356 sfq perturb 10
 $TC class add dev eth1 parent 1:355 classid 1:357 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:357 handle 357 sfq perturb 10
# host: fasolka (link: dsl2)
$TC class add dev eth0 parent 1:2 classid 1:358 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:358 classid 1:359 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:359 handle 359 sfq perturb 10
 $TC class add dev eth0 parent 1:358 classid 1:360 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:360 handle 360 sfq perturb 10
$TC class add dev eth1 parent 1:2 classid 1:358 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:358 classid 1:359 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:359 handle 359 sfq perturb 10
 $TC class add dev eth1 parent 1:358 classid 1:360 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:360 handle 360 sfq perturb 10
# host: feldi (link: dsl1)
$TC class add dev eth0 parent 1:1 classid 1:361 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:361 classid 1:362 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:362 handle 362 sfq perturb 10
 $TC class add dev eth0 parent 1:361 classid 1:363 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:363 handle 363 sfq perturb 10
$TC class add dev eth1 parent 1:1 classid 1:361 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:361 classid 1:362 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:362 handle 362 sfq perturb 10
 $TC class add dev eth1 parent 1:361 classid 1:363 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:363 handle 363 sfq perturb 10
# host: feldi (link: dsl2)
$TC class add dev eth0 parent 1:2 classid 1:364 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:364 classid 1:365 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:365 handle 365 sfq perturb 10
 $TC class add dev eth0 parent 1:364 classid 1:366 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:366 handle 366 sfq perturb 10
$TC class add dev eth1 parent 1:2 classid 1:364 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:364 classid 1:365 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:365 handle 365 sfq perturb 10
 $TC class add dev eth1 parent 1:364 classid 1:366 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:366 handle 366 sfq perturb 10
# host: fen (link: dsl1)
$TC class add dev eth0 parent 1:1 classid 1:367 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:367 classid 1:368 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:368 handle 368 sfq perturb 10
 $TC class add dev eth0 parent 1:367 classid 1:369 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:369 handle 369 sfq perturb 10
$TC class add dev eth1 parent 1:1 classid 1:367 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:367 classid 1:368 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:368 handle 368 sfq perturb 10
 $TC class add dev eth1 parent 1:367 classid 1:369 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:369 handle 369 sfq perturb 10
# host: fen (link: dsl2)
$TC class add dev eth0 parent 1:2 classid 1:370 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:370 classid 1:371 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:371 handle 371 sfq perturb 10
 $TC class add dev eth0 parent 1:370 classid 1:372 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:372 handle 372 sfq perturb 10
$TC class add dev eth1 parent 1:2 classid 1:370 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:370 classid 1:371 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:371 handle 371 sfq perturb 10
 $TC class add dev eth1 parent 1:370 classid 1:372 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:372 handle 372 sfq perturb 10
# host: fides (link: dsl1)
$TC class add dev eth0 parent 1:1 classid 1:373 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:373 classid 1:374 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:374 handle 374 sfq perturb 10
 $TC class add dev eth0 parent 1:373 classid 1:375 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:375 handle 375 sfq perturb 10
$TC class add dev eth1 parent 1:1 classid 1:373 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:373 classid 1:374 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:374 handle 374 sfq perturb 10
 $TC class add dev eth1 parent 1:373 classid 1:375 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:375 handle 375 sfq perturb 10
# host: fides (link: dsl2)
$TC class add dev eth0 parent 1:2 classid 1:376 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:376 classid 1:377 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:377 handle 377 sfq perturb 10
 $TC class add dev eth0 parent 1:376 classid 1:378 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:378 handle 378 sfq perturb 10
$TC class add dev eth1 parent 1:2 classid 1:376 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:376 classid 1:377 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:377 handle 377 sfq perturb 10
 $TC class add dev eth1 parent 1:376 classid 1:378 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:378 handle 378 sfq perturb 10
# host: figa (link: dsl1)
$TC class add dev eth0 parent 1:1 classid 1:379 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:379 classid 1:380 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:380 handle 380 sfq perturb 10
 $TC class add dev eth0 parent 1:379 classid 1:381 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:381 handle 381 sfq perturb 10
$TC class add dev eth1 parent 1:1 classid 1:379 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:379 classid 1:380 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:380 handle 380 sfq perturb 10
 $TC class add dev eth1 parent 1:379 classid 1:381 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:381 handle 381 sfq perturb 10
# host: figa (link: dsl2)
$TC class add dev eth0 parent 1:2 classid 1:382 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:382 classid 1:383 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:383 handle 383 sfq perturb 10
 $TC class add dev eth0 parent 1:382 classid 1:384 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:384 handle 384 sfq perturb 10
$TC class add dev eth1 parent 1:2 classid 1:382 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:382 classid 1:383 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:383 handle 383 sfq perturb 10
 $TC class add dev eth1 parent 1:382 classid 1:384 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:384 handle 384 sfq perturb 10
# host: filemonn (link: dsl1)
$TC class add dev eth0 parent 1:1 classid 1:385 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:385 classid 1:386 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:386 handle 386 sfq perturb 10
 $TC class add dev eth0 parent 1:385 classid 1:387 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:387 handle 387 sfq perturb 10
$TC class add dev eth1 parent 1:1 classid 1:385 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:385 classid 1:386 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:386 handle 386 sfq perturb 10
 $TC class add dev eth1 parent 1:385 classid 1:387 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:387 handle 387 sfq perturb 10
# host: filemonn (link: dsl2)
$TC class add dev eth0 parent 1:2 classid 1:388 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:388 classid 1:389 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:389 handle 389 sfq perturb 10
 $TC class add dev eth0 parent 1:388 classid 1:390 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:390 handle 390 sfq perturb 10
$TC class add dev eth1 parent 1:2 classid 1:388 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:388 classid 1:389 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:389 handle 389 sfq perturb 10
 $TC class add dev eth1 parent 1:388 classid 1:390 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:390 handle 390 sfq perturb 10
# host: gajda (link: dsl1)
$TC class add dev eth0 parent 1:1 classid 1:391 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:391 classid 1:392 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:392 handle 392 sfq perturb 10
 $TC class add dev eth0 parent 1:391 classid 1:393 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:393 handle 393 sfq perturb 10
$TC class add dev eth1 parent 1:1 classid 1:391 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:391 classid 1:392 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:392 handle 392 sfq perturb 10
 $TC class add dev eth1 parent 1:391 classid 1:393 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:393 handle 393 sfq perturb 10
# host: gajda (link: dsl2)
$TC class add dev eth0 parent 1:2 classid 1:394 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:394 classid 1:395 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:395 handle 395 sfq perturb 10
 $TC class add dev eth0 parent 1:394 classid 1:396 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:396 handle 396 sfq perturb 10
$TC class add dev eth1 parent 1:2 classid 1:394 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:394 classid 1:395 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:395 handle 395 sfq perturb 10
 $TC class add dev eth1 parent 1:394 classid 1:396 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:396 handle 396 sfq perturb 10
# host: garfield (link: dsl1)
$TC class add dev eth0 parent 1:1 classid 1:397 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:397 classid 1:398 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:398 handle 398 sfq perturb 10
 $TC class add dev eth0 parent 1:397 classid 1:399 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:399 handle 399 sfq perturb 10
$TC class add dev eth1 parent 1:1 classid 1:397 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:397 classid 1:398 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:398 handle 398 sfq perturb 10
 $TC class add dev eth1 parent 1:397 classid 1:399 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:399 handle 399 sfq perturb 10
# host: garfield (link: dsl2)
$TC class add dev eth0 parent 1:2 classid 1:400 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:400 classid 1:401 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:401 handle 401 sfq perturb 10
 $TC class add dev eth0 parent 1:400 classid 1:402 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:402 handle 402 sfq perturb 10
$TC class add dev eth1 parent 1:2 classid 1:400 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:400 classid 1:401 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:401 handle 401 sfq perturb 10
 $TC class add dev eth1 parent 1:400 classid 1:402 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:402 handle 402 sfq perturb 10
# host: gateway (link: dsl1)
$TC class add dev eth0 parent 1:1 classid 1:403 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:403 classid 1:404 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:404 handle 404 sfq perturb 10
 $TC class add dev eth0 parent 1:403 classid 1:405 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:405 handle 405 sfq perturb 10
$TC class add dev eth1 parent 1:1 classid 1:403 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:403 classid 1:404 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:404 handle 404 sfq perturb 10
 $TC class add dev eth1 parent 1:403 classid 1:405 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:405 handle 405 sfq perturb 10
# host: gateway (link: dsl2)
$TC class add dev eth0 parent 1:2 classid 1:406 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:406 classid 1:407 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:407 handle 407 sfq perturb 10
 $TC class add dev eth0 parent 1:406 classid 1:408 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:408 handle 408 sfq perturb 10
$TC class add dev eth1 parent 1:2 classid 1:406 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:406 classid 1:407 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:407 handle 407 sfq perturb 10
 $TC class add dev eth1 parent 1:406 classid 1:408 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:408 handle 408 sfq perturb 10
# host: glynis (link: dsl1)
$TC class add dev eth0 parent 1:1 classid 1:409 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:409 classid 1:410 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:410 handle 410 sfq perturb 10
 $TC class add dev eth0 parent 1:409 classid 1:411 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:411 handle 411 sfq perturb 10
$TC class add dev eth1 parent 1:1 classid 1:409 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:409 classid 1:410 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:410 handle 410 sfq perturb 10
 $TC class add dev eth1 parent 1:409 classid 1:411 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:411 handle 411 sfq perturb 10
# host: glynis (link: dsl2)
$TC class add dev eth0 parent 1:2 classid 1:412 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:412 classid 1:413 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:413 handle 413 sfq perturb 10
 $TC class add dev eth0 parent 1:412 classid 1:414 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:414 handle 414 sfq perturb 10
$TC class add dev eth1 parent 1:2 classid 1:412 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:412 classid 1:413 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:413 handle 413 sfq perturb 10
 $TC class add dev eth1 parent 1:412 classid 1:414 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:414 handle 414 sfq perturb 10
# host: golemy (link: dsl1)
$TC class add dev eth0 parent 1:1 classid 1:415 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:415 classid 1:416 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:416 handle 416 sfq perturb 10
 $TC class add dev eth0 parent 1:415 classid 1:417 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:417 handle 417 sfq perturb 10
$TC class add dev eth1 parent 1:1 classid 1:415 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:415 classid 1:416 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:416 handle 416 sfq perturb 10
 $TC class add dev eth1 parent 1:415 classid 1:417 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:417 handle 417 sfq perturb 10
# host: golemy (link: dsl2)
$TC class add dev eth0 parent 1:2 classid 1:418 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:418 classid 1:419 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:419 handle 419 sfq perturb 10
 $TC class add dev eth0 parent 1:418 classid 1:420 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:420 handle 420 sfq perturb 10
$TC class add dev eth1 parent 1:2 classid 1:418 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:418 classid 1:419 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:419 handle 419 sfq perturb 10
 $TC class add dev eth1 parent 1:418 classid 1:420 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:420 handle 420 sfq perturb 10
# host: goosia (link: dsl1)
$TC class add dev eth0 parent 1:1 classid 1:421 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:421 classid 1:422 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:422 handle 422 sfq perturb 10
 $TC class add dev eth0 parent 1:421 classid 1:423 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:423 handle 423 sfq perturb 10
$TC class add dev eth1 parent 1:1 classid 1:421 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:421 classid 1:422 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:422 handle 422 sfq perturb 10
 $TC class add dev eth1 parent 1:421 classid 1:423 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:423 handle 423 sfq perturb 10
# host: goosia (link: dsl2)
$TC class add dev eth0 parent 1:2 classid 1:424 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:424 classid 1:425 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:425 handle 425 sfq perturb 10
 $TC class add dev eth0 parent 1:424 classid 1:426 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:426 handle 426 sfq perturb 10
$TC class add dev eth1 parent 1:2 classid 1:424 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:424 classid 1:425 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:425 handle 425 sfq perturb 10
 $TC class add dev eth1 parent 1:424 classid 1:426 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:426 handle 426 sfq perturb 10
# host: gordon (link: dsl1)
$TC class add dev eth0 parent 1:1 classid 1:427 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:427 classid 1:428 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:428 handle 428 sfq perturb 10
 $TC class add dev eth0 parent 1:427 classid 1:429 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:429 handle 429 sfq perturb 10
$TC class add dev eth1 parent 1:1 classid 1:427 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:427 classid 1:428 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:428 handle 428 sfq perturb 10
 $TC class add dev eth1 parent 1:427 classid 1:429 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:429 handle 429 sfq perturb 10
# host: gordon (link: dsl2)
$TC class add dev eth0 parent 1:2 classid 1:430 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:430 classid 1:431 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:431 handle 431 sfq perturb 10
 $TC class add dev eth0 parent 1:430 classid 1:432 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:432 handle 432 sfq perturb 10
$TC class add dev eth1 parent 1:2 classid 1:430 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:430 classid 1:431 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:431 handle 431 sfq perturb 10
 $TC class add dev eth1 parent 1:430 classid 1:432 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:432 handle 432 sfq perturb 10
# host: gosia (link: dsl1)
$TC class add dev eth0 parent 1:1 classid 1:433 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:433 classid 1:434 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:434 handle 434 sfq perturb 10
 $TC class add dev eth0 parent 1:433 classid 1:435 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:435 handle 435 sfq perturb 10
$TC class add dev eth1 parent 1:1 classid 1:433 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:433 classid 1:434 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:434 handle 434 sfq perturb 10
 $TC class add dev eth1 parent 1:433 classid 1:435 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:435 handle 435 sfq perturb 10
# host: gosia (link: dsl2)
$TC class add dev eth0 parent 1:2 classid 1:436 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:436 classid 1:437 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:437 handle 437 sfq perturb 10
 $TC class add dev eth0 parent 1:436 classid 1:438 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:438 handle 438 sfq perturb 10
$TC class add dev eth1 parent 1:2 classid 1:436 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:436 classid 1:437 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:437 handle 437 sfq perturb 10
 $TC class add dev eth1 parent 1:436 classid 1:438 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:438 handle 438 sfq perturb 10
# host: greg (link: dsl1)
$TC class add dev eth0 parent 1:1 classid 1:439 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:439 classid 1:440 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:440 handle 440 sfq perturb 10
 $TC class add dev eth0 parent 1:439 classid 1:441 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:441 handle 441 sfq perturb 10
$TC class add dev eth1 parent 1:1 classid 1:439 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:439 classid 1:440 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:440 handle 440 sfq perturb 10
 $TC class add dev eth1 parent 1:439 classid 1:441 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:441 handle 441 sfq perturb 10
# host: greg (link: dsl2)
$TC class add dev eth0 parent 1:2 classid 1:442 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:442 classid 1:443 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:443 handle 443 sfq perturb 10
 $TC class add dev eth0 parent 1:442 classid 1:444 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:444 handle 444 sfq perturb 10
$TC class add dev eth1 parent 1:2 classid 1:442 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:442 classid 1:443 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:443 handle 443 sfq perturb 10
 $TC class add dev eth1 parent 1:442 classid 1:444 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:444 handle 444 sfq perturb 10
# host: gremlin (link: dsl1)
$TC class add dev eth0 parent 1:1 classid 1:445 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:445 classid 1:446 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:446 handle 446 sfq perturb 10
 $TC class add dev eth0 parent 1:445 classid 1:447 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:447 handle 447 sfq perturb 10
$TC class add dev eth1 parent 1:1 classid 1:445 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:445 classid 1:446 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:446 handle 446 sfq perturb 10
 $TC class add dev eth1 parent 1:445 classid 1:447 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:447 handle 447 sfq perturb 10
# host: gremlin (link: dsl2)
$TC class add dev eth0 parent 1:2 classid 1:448 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:448 classid 1:449 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:449 handle 449 sfq perturb 10
 $TC class add dev eth0 parent 1:448 classid 1:450 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:450 handle 450 sfq perturb 10
$TC class add dev eth1 parent 1:2 classid 1:448 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:448 classid 1:449 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:449 handle 449 sfq perturb 10
 $TC class add dev eth1 parent 1:448 classid 1:450 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:450 handle 450 sfq perturb 10
# host: h3000gt (link: dsl1)
$TC class add dev eth0 parent 1:1 classid 1:451 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:451 classid 1:452 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:452 handle 452 sfq perturb 10
 $TC class add dev eth0 parent 1:451 classid 1:453 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:453 handle 453 sfq perturb 10
$TC class add dev eth1 parent 1:1 classid 1:451 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:451 classid 1:452 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:452 handle 452 sfq perturb 10
 $TC class add dev eth1 parent 1:451 classid 1:453 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:453 handle 453 sfq perturb 10
# host: h3000gt (link: dsl2)
$TC class add dev eth0 parent 1:2 classid 1:454 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:454 classid 1:455 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:455 handle 455 sfq perturb 10
 $TC class add dev eth0 parent 1:454 classid 1:456 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:456 handle 456 sfq perturb 10
$TC class add dev eth1 parent 1:2 classid 1:454 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:454 classid 1:455 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:455 handle 455 sfq perturb 10
 $TC class add dev eth1 parent 1:454 classid 1:456 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:456 handle 456 sfq perturb 10
# host: h32m27 (link: dsl1)
$TC class add dev eth0 parent 1:1 classid 1:457 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:457 classid 1:458 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:458 handle 458 sfq perturb 10
 $TC class add dev eth0 parent 1:457 classid 1:459 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:459 handle 459 sfq perturb 10
$TC class add dev eth1 parent 1:1 classid 1:457 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:457 classid 1:458 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:458 handle 458 sfq perturb 10
 $TC class add dev eth1 parent 1:457 classid 1:459 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:459 handle 459 sfq perturb 10
# host: h32m27 (link: dsl2)
$TC class add dev eth0 parent 1:2 classid 1:460 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:460 classid 1:461 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:461 handle 461 sfq perturb 10
 $TC class add dev eth0 parent 1:460 classid 1:462 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:462 handle 462 sfq perturb 10
$TC class add dev eth1 parent 1:2 classid 1:460 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:460 classid 1:461 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:461 handle 461 sfq perturb 10
 $TC class add dev eth1 parent 1:460 classid 1:462 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:462 handle 462 sfq perturb 10
# host: hera (link: dsl1)
$TC class add dev eth0 parent 1:1 classid 1:463 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:463 classid 1:464 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:464 handle 464 sfq perturb 10
 $TC class add dev eth0 parent 1:463 classid 1:465 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:465 handle 465 sfq perturb 10
$TC class add dev eth1 parent 1:1 classid 1:463 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:463 classid 1:464 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:464 handle 464 sfq perturb 10
 $TC class add dev eth1 parent 1:463 classid 1:465 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:465 handle 465 sfq perturb 10
# host: hera (link: dsl2)
$TC class add dev eth0 parent 1:2 classid 1:466 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:466 classid 1:467 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:467 handle 467 sfq perturb 10
 $TC class add dev eth0 parent 1:466 classid 1:468 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:468 handle 468 sfq perturb 10
$TC class add dev eth1 parent 1:2 classid 1:466 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:466 classid 1:467 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:467 handle 467 sfq perturb 10
 $TC class add dev eth1 parent 1:466 classid 1:468 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:468 handle 468 sfq perturb 10
# host: hermanmuller (link: dsl1)
$TC class add dev eth0 parent 1:1 classid 1:469 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:469 classid 1:470 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:470 handle 470 sfq perturb 10
 $TC class add dev eth0 parent 1:469 classid 1:471 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:471 handle 471 sfq perturb 10
$TC class add dev eth1 parent 1:1 classid 1:469 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:469 classid 1:470 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:470 handle 470 sfq perturb 10
 $TC class add dev eth1 parent 1:469 classid 1:471 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:471 handle 471 sfq perturb 10
# host: hermanmuller (link: dsl2)
$TC class add dev eth0 parent 1:2 classid 1:472 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:472 classid 1:473 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:473 handle 473 sfq perturb 10
 $TC class add dev eth0 parent 1:472 classid 1:474 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:474 handle 474 sfq perturb 10
$TC class add dev eth1 parent 1:2 classid 1:472 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:472 classid 1:473 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:473 handle 473 sfq perturb 10
 $TC class add dev eth1 parent 1:472 classid 1:474 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:474 handle 474 sfq perturb 10
# host: ifs (link: dsl1)
$TC class add dev eth0 parent 1:1 classid 1:475 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:475 classid 1:476 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:476 handle 476 sfq perturb 10
 $TC class add dev eth0 parent 1:475 classid 1:477 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:477 handle 477 sfq perturb 10
$TC class add dev eth1 parent 1:1 classid 1:475 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:475 classid 1:476 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:476 handle 476 sfq perturb 10
 $TC class add dev eth1 parent 1:475 classid 1:477 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:477 handle 477 sfq perturb 10
# host: ifs (link: dsl2)
$TC class add dev eth0 parent 1:2 classid 1:478 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:478 classid 1:479 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:479 handle 479 sfq perturb 10
 $TC class add dev eth0 parent 1:478 classid 1:480 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:480 handle 480 sfq perturb 10
$TC class add dev eth1 parent 1:2 classid 1:478 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:478 classid 1:479 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:479 handle 479 sfq perturb 10
 $TC class add dev eth1 parent 1:478 classid 1:480 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:480 handle 480 sfq perturb 10
# host: ingus (link: dsl1)
$TC class add dev eth0 parent 1:1 classid 1:481 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:481 classid 1:482 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:482 handle 482 sfq perturb 10
 $TC class add dev eth0 parent 1:481 classid 1:483 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:483 handle 483 sfq perturb 10
$TC class add dev eth1 parent 1:1 classid 1:481 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:481 classid 1:482 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:482 handle 482 sfq perturb 10
 $TC class add dev eth1 parent 1:481 classid 1:483 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:483 handle 483 sfq perturb 10
# host: ingus (link: dsl2)
$TC class add dev eth0 parent 1:2 classid 1:484 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:484 classid 1:485 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:485 handle 485 sfq perturb 10
 $TC class add dev eth0 parent 1:484 classid 1:486 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:486 handle 486 sfq perturb 10
$TC class add dev eth1 parent 1:2 classid 1:484 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:484 classid 1:485 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:485 handle 485 sfq perturb 10
 $TC class add dev eth1 parent 1:484 classid 1:486 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:486 handle 486 sfq perturb 10
# host: italia (link: dsl1)
$TC class add dev eth0 parent 1:1 classid 1:487 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:487 classid 1:488 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:488 handle 488 sfq perturb 10
 $TC class add dev eth0 parent 1:487 classid 1:489 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:489 handle 489 sfq perturb 10
$TC class add dev eth1 parent 1:1 classid 1:487 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:487 classid 1:488 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:488 handle 488 sfq perturb 10
 $TC class add dev eth1 parent 1:487 classid 1:489 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:489 handle 489 sfq perturb 10
# host: italia (link: dsl2)
$TC class add dev eth0 parent 1:2 classid 1:490 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:490 classid 1:491 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:491 handle 491 sfq perturb 10
 $TC class add dev eth0 parent 1:490 classid 1:492 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:492 handle 492 sfq perturb 10
$TC class add dev eth1 parent 1:2 classid 1:490 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:490 classid 1:491 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:491 handle 491 sfq perturb 10
 $TC class add dev eth1 parent 1:490 classid 1:492 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:492 handle 492 sfq perturb 10
# host: jacek (link: dsl1)
$TC class add dev eth0 parent 1:1 classid 1:493 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:493 classid 1:494 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:494 handle 494 sfq perturb 10
 $TC class add dev eth0 parent 1:493 classid 1:495 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:495 handle 495 sfq perturb 10
$TC class add dev eth1 parent 1:1 classid 1:493 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:493 classid 1:494 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:494 handle 494 sfq perturb 10
 $TC class add dev eth1 parent 1:493 classid 1:495 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:495 handle 495 sfq perturb 10
# host: jacek (link: dsl2)
$TC class add dev eth0 parent 1:2 classid 1:496 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:496 classid 1:497 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:497 handle 497 sfq perturb 10
 $TC class add dev eth0 parent 1:496 classid 1:498 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:498 handle 498 sfq perturb 10
$TC class add dev eth1 parent 1:2 classid 1:496 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:496 classid 1:497 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:497 handle 497 sfq perturb 10
 $TC class add dev eth1 parent 1:496 classid 1:498 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:498 handle 498 sfq perturb 10
# host: jadzia (link: dsl1)
$TC class add dev eth0 parent 1:1 classid 1:499 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:499 classid 1:500 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:500 handle 500 sfq perturb 10
 $TC class add dev eth0 parent 1:499 classid 1:501 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:501 handle 501 sfq perturb 10
$TC class add dev eth1 parent 1:1 classid 1:499 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:499 classid 1:500 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:500 handle 500 sfq perturb 10
 $TC class add dev eth1 parent 1:499 classid 1:501 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:501 handle 501 sfq perturb 10
# host: jadzia (link: dsl2)
$TC class add dev eth0 parent 1:2 classid 1:502 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:502 classid 1:503 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:503 handle 503 sfq perturb 10
 $TC class add dev eth0 parent 1:502 classid 1:504 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:504 handle 504 sfq perturb 10
$TC class add dev eth1 parent 1:2 classid 1:502 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:502 classid 1:503 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:503 handle 503 sfq perturb 10
 $TC class add dev eth1 parent 1:502 classid 1:504 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:504 handle 504 sfq perturb 10
# host: jagoda (link: dsl1)
$TC class add dev eth0 parent 1:1 classid 1:505 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:505 classid 1:506 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:506 handle 506 sfq perturb 10
 $TC class add dev eth0 parent 1:505 classid 1:507 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:507 handle 507 sfq perturb 10
$TC class add dev eth1 parent 1:1 classid 1:505 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:505 classid 1:506 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:506 handle 506 sfq perturb 10
 $TC class add dev eth1 parent 1:505 classid 1:507 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:507 handle 507 sfq perturb 10
# host: jagoda (link: dsl2)
$TC class add dev eth0 parent 1:2 classid 1:508 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:508 classid 1:509 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:509 handle 509 sfq perturb 10
 $TC class add dev eth0 parent 1:508 classid 1:510 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:510 handle 510 sfq perturb 10
$TC class add dev eth1 parent 1:2 classid 1:508 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:508 classid 1:509 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:509 handle 509 sfq perturb 10
 $TC class add dev eth1 parent 1:508 classid 1:510 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:510 handle 510 sfq perturb 10
# host: janda (link: dsl1)
$TC class add dev eth0 parent 1:1 classid 1:511 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:511 classid 1:512 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:512 handle 512 sfq perturb 10
 $TC class add dev eth0 parent 1:511 classid 1:513 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:513 handle 513 sfq perturb 10
$TC class add dev eth1 parent 1:1 classid 1:511 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:511 classid 1:512 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:512 handle 512 sfq perturb 10
 $TC class add dev eth1 parent 1:511 classid 1:513 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:513 handle 513 sfq perturb 10
# host: janda (link: dsl2)
$TC class add dev eth0 parent 1:2 classid 1:514 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:514 classid 1:515 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:515 handle 515 sfq perturb 10
 $TC class add dev eth0 parent 1:514 classid 1:516 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:516 handle 516 sfq perturb 10
$TC class add dev eth1 parent 1:2 classid 1:514 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:514 classid 1:515 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:515 handle 515 sfq perturb 10
 $TC class add dev eth1 parent 1:514 classid 1:516 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:516 handle 516 sfq perturb 10
# host: jank638 (link: dsl1)
$TC class add dev eth0 parent 1:1 classid 1:517 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:517 classid 1:518 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:518 handle 518 sfq perturb 10
 $TC class add dev eth0 parent 1:517 classid 1:519 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:519 handle 519 sfq perturb 10
$TC class add dev eth1 parent 1:1 classid 1:517 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:517 classid 1:518 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:518 handle 518 sfq perturb 10
 $TC class add dev eth1 parent 1:517 classid 1:519 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:519 handle 519 sfq perturb 10
# host: jank638 (link: dsl2)
$TC class add dev eth0 parent 1:2 classid 1:520 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:520 classid 1:521 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:521 handle 521 sfq perturb 10
 $TC class add dev eth0 parent 1:520 classid 1:522 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:522 handle 522 sfq perturb 10
$TC class add dev eth1 parent 1:2 classid 1:520 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:520 classid 1:521 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:521 handle 521 sfq perturb 10
 $TC class add dev eth1 parent 1:520 classid 1:522 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:522 handle 522 sfq perturb 10
# host: jedik (link: dsl1)
$TC class add dev eth0 parent 1:1 classid 1:523 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:523 classid 1:524 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:524 handle 524 sfq perturb 10
 $TC class add dev eth0 parent 1:523 classid 1:525 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:525 handle 525 sfq perturb 10
$TC class add dev eth1 parent 1:1 classid 1:523 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:523 classid 1:524 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:524 handle 524 sfq perturb 10
 $TC class add dev eth1 parent 1:523 classid 1:525 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:525 handle 525 sfq perturb 10
# host: jedik (link: dsl2)
$TC class add dev eth0 parent 1:2 classid 1:526 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:526 classid 1:527 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:527 handle 527 sfq perturb 10
 $TC class add dev eth0 parent 1:526 classid 1:528 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:528 handle 528 sfq perturb 10
$TC class add dev eth1 parent 1:2 classid 1:526 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:526 classid 1:527 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:527 handle 527 sfq perturb 10
 $TC class add dev eth1 parent 1:526 classid 1:528 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:528 handle 528 sfq perturb 10
# host: jerry (link: dsl1)
$TC class add dev eth0 parent 1:1 classid 1:529 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:529 classid 1:530 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:530 handle 530 sfq perturb 10
 $TC class add dev eth0 parent 1:529 classid 1:531 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:531 handle 531 sfq perturb 10
$TC class add dev eth1 parent 1:1 classid 1:529 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:529 classid 1:530 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:530 handle 530 sfq perturb 10
 $TC class add dev eth1 parent 1:529 classid 1:531 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:531 handle 531 sfq perturb 10
# host: jerry (link: dsl2)
$TC class add dev eth0 parent 1:2 classid 1:532 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:532 classid 1:533 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:533 handle 533 sfq perturb 10
 $TC class add dev eth0 parent 1:532 classid 1:534 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:534 handle 534 sfq perturb 10
$TC class add dev eth1 parent 1:2 classid 1:532 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:532 classid 1:533 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:533 handle 533 sfq perturb 10
 $TC class add dev eth1 parent 1:532 classid 1:534 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:534 handle 534 sfq perturb 10
# host: jfk (link: dsl1)
$TC class add dev eth0 parent 1:1 classid 1:535 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:535 classid 1:536 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:536 handle 536 sfq perturb 10
 $TC class add dev eth0 parent 1:535 classid 1:537 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:537 handle 537 sfq perturb 10
$TC class add dev eth1 parent 1:1 classid 1:535 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:535 classid 1:536 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:536 handle 536 sfq perturb 10
 $TC class add dev eth1 parent 1:535 classid 1:537 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:537 handle 537 sfq perturb 10
# host: jfk (link: dsl2)
$TC class add dev eth0 parent 1:2 classid 1:538 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:538 classid 1:539 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:539 handle 539 sfq perturb 10
 $TC class add dev eth0 parent 1:538 classid 1:540 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:540 handle 540 sfq perturb 10
$TC class add dev eth1 parent 1:2 classid 1:538 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:538 classid 1:539 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:539 handle 539 sfq perturb 10
 $TC class add dev eth1 parent 1:538 classid 1:540 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:540 handle 540 sfq perturb 10
# host: joanna (link: dsl1)
$TC class add dev eth0 parent 1:1 classid 1:541 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:541 classid 1:542 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:542 handle 542 sfq perturb 10
 $TC class add dev eth0 parent 1:541 classid 1:543 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:543 handle 543 sfq perturb 10
$TC class add dev eth1 parent 1:1 classid 1:541 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:541 classid 1:542 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:542 handle 542 sfq perturb 10
 $TC class add dev eth1 parent 1:541 classid 1:543 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:543 handle 543 sfq perturb 10
# host: joanna (link: dsl2)
$TC class add dev eth0 parent 1:2 classid 1:544 htb rate 6142.500000bps ceil 187500.000000bps
 $TC class add dev eth0 parent 1:544 classid 1:545 htb rate 3071.250000bps ceil 187500.000000bps prio 0
  $TC qdisc add dev eth0 parent 1:545 handle 545 sfq perturb 10
 $TC class add dev eth0 parent 1:544 classid 1:546 htb rate 3071.250000bps ceil 187500.000000bps prio 1
  $TC qdisc add dev eth0 parent 1:546 handle 546 sfq perturb 10
$TC class add dev eth1 parent 1:2 classid 1:544 htb rate 706.375000bps ceil 6000.000000bps
 $TC class add dev eth1 parent 1:544 classid 1:545 htb rate 353.125000bps ceil 6000.000000bps prio 0
  $TC qdisc add dev eth1 parent 1:545 handle 545 sfq perturb 10
 $TC class add dev eth1 parent 1:544 classid 1:546 htb rate 353.125000bps ceil 6000.000000bps prio 1
  $TC qdisc add dev eth1 parent 1:546 handle 546 sfq perturb 10
