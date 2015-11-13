<?php
/* Sucuri integrity monitor
 * Integrity checking and server side scanning.
 *
 * Copyright (C) 2010, 2011, 2012 Sucuri, LLC
 * http://sucuri.net
 * Do not distribute or share.
 */

$MYMONITOR = "monitor16";
$my_sucuri_encoding = "



LyogU3VjdXJpIGludGVncml0eSBtb25pdG9yIC4gCiAqIENvbm5lY3RzIGJhY2sgaG9tZS4KICog
Q29weXJpZ2h0IChDKSAyMDEwLTIwMTMgU3VjdXJpLCBMTEMKICogRG8gbm90IGRpc3RyaWJ1dGUg
b3Igc2hhcmUuCiAqLwoKCiRTVUNVUklQV0QgPSAiNTM1ZTI2ZWIwZjMzMjRlODA1NmZlNjk1NDk3
NmIwNGM2MmViOTc3ZjJjYzUxIjsKCgppZihpc3NldCgkX0dFVFsndGVzdCddKSkKewogICAgZWNo
byAiT0s6IFN1Y3VyaTogRm91bmRcbiI7CiAgICBleGl0KDApOwp9CgoKCi8qIFZhbGlkIGFyZ3Vt
ZW50LiAqLwppZighaXNzZXQoJF9HRVRbJ3J1biddKSkKewogICAgZXhpdCgwKTsKfQoKCi8qIE11
c3QgaGF2ZSBhbiBJUCBhZGRyZXNzLiAqLwppZighaXNzZXQoJF9TRVJWRVJbJ1JFTU9URV9BRERS
J10pKQp7CiAgICBleGl0KDApOwp9Cgokb3JpZ3JlbW90ZWlwID0gJF9TRVJWRVJbJ1JFTU9URV9B
RERSJ107CgovKiBJZiBjb21pbmcgZnJvbSBjbG91ZGZsYXJlOiAqLwppZihpc3NldCgkX1NFUlZF
UlsnSFRUUF9DRl9DT05ORUNUSU5HX0lQJ10pKQp7CiAgICAkX1NFUlZFUlsnUkVNT1RFX0FERFIn
XSA9ICRfU0VSVkVSWydIVFRQX0NGX0NPTk5FQ1RJTkdfSVAnXTsKfQovKiBNb3JlIGdhdGV3YXkg
cmVxdWVzdHMuICovCmVsc2UgaWYoaXNzZXQoJF9TRVJWRVJbJ0hUVFBfWF9PUklHX0NMSUVOVF9J
UCddKSkKewogICAgJF9TRVJWRVJbJ1JFTU9URV9BRERSJ10gPSAkX1NFUlZFUlsnSFRUUF9YX09S
SUdfQ0xJRU5UX0lQJ107Cn0KZWxzZSBpZihpc3NldCgkX1NFUlZFUlsnSFRUUF9DTElFTlRfSVAn
XSkpCnsKICAgICRfU0VSVkVSWydSRU1PVEVfQUREUiddID0gJF9TRVJWRVJbJ0hUVFBfQ0xJRU5U
X0lQJ107Cn0KLyogUHJveHkgcmVxdWVzdHMuICovCmVsc2UgaWYoaXNzZXQoJF9TRVJWRVJbJ0hU
VFBfVFJVRV9DTElFTlRfSVAnXSkpCnsKICAgICRfU0VSVkVSWydSRU1PVEVfQUREUiddID0gJF9T
RVJWRVJbJ0hUVFBfVFJVRV9DTElFTlRfSVAnXTsKfQovKiBQcm94eSByZXF1ZXN0cy4gKi8KZWxz
ZSBpZihpc3NldCgkX1NFUlZFUlsnSFRUUF9YX1JFQUxfSVAnXSkpCnsKICAgICRfU0VSVkVSWydS
RU1PVEVfQUREUiddID0gJF9TRVJWRVJbJ0hUVFBfWF9SRUFMX0lQJ107Cn0KLyogTW9yZSBnYXRl
d2F5IHJlcXVlc3RzLiAqLwplbHNlIGlmKGlzc2V0KCRfU0VSVkVSWydIVFRQX1hfRk9SV0FSREVE
X0ZPUiddKSkKewogICAgJF9TRVJWRVJbJ1JFTU9URV9BRERSJ10gPSAkX1NFUlZFUlsnSFRUUF9Y
X0ZPUldBUkRFRF9GT1InXTsKfQoKCiRteWlwbGlzdCA9IGFycmF5KAonOTcuNzQuMTI3LjE3MScs
Cic2OS4xNjQuMjAzLjE3MicsCicxNzMuMjMwLjEyOC4xMzUnLAonNjYuMjI4LjM0LjQ5JywKJzY2
LjIyOC40MC4xODUnLAonNTAuMTE2LjMuMTcxJywKJzUwLjExNi4zNi45MicsCicxOTguNTguOTYu
MjEyJywKJzUwLjExNi42My4yMjEnLAonMTkyLjE1NS45Mi4xMTInLAonMTkyLjgxLjEyOC4zMScs
CicxOTguNTguMTA2LjI0NCcsCicyNjAwOjNjMDA6OmYwM2M6OTFmZjpmZWFlOmUxMDQnLAonMjYw
MDozYzAyOjpmMDNjOjkxZmY6ZmVkZjo1OGM2JywKJzI2MDA6M2MwMjo6ZjAzYzo5MWZmOmZlZGY6
NTgzNScsCicyNjAwOjNjMDM6OmYwM2M6OTFmZjpmZWRmOjZhN2EnLAonZmU4MDo6ZmNmZDphZGZm
OmZlZTY6ODA4NycsCicyNjAwOjNjMDM6OmYwM2M6OTFmZjpmZTcwOjM2Y2UnLAonMjYwMDozYzAy
OjpmMDNjOjkxZmY6ZmU3MDpmMTJkJywKJzI2MDA6M2MwMTo6ZjAzYzo5MWZmOmZlNzA6NTJiYics
Cic1MC4xMTYuMzYuOTMnLAoiMTkyLjE1NS45NS4xMzkiLAoiMjYwMDozYzAyOjpmMDNjOjkxZmY6
ZmU2OTo0YjY2IiwKIjI2MDA6M2MwMDo6ZjAzYzo5MWZmOmZlNzA6NTIxMyIsCiIyNjAwOjNjMDM6
OmYwM2M6OTFmZjpmZWRiOmI5Y2UiLAoiMjMuMjM5LjkuMjI3IiwKIjE5OC41OC4xMTIuMTAzIiwK
IjE5Mi4xNTUuOTQuNDMiLAoiMTYyLjIxNi4xNi4zMyIsCiIyNjAwOjNjMDA6OmYwM2M6OTFmZjpm
ZTZlOmEwNDYiLAoiMjYwMDozYzAyOjpmMDNjOjkxZmY6ZmU2ZTphMGRkIiwKIjI2MDA6M2MwMzo6
ZjAzYzo5MWZmOmZlNmU6YTBhYyIsCik7CgoKJGlwbWF0Y2hlcyA9IDA7Cgpmb3JlYWNoKCRteWlw
bGlzdCBhcyAkbXlpcCkKewogICAgaWYoc3RycG9zKCRfU0VSVkVSWydSRU1PVEVfQUREUiddLCAk
bXlpcCkgIT09IEZBTFNFKQogICAgewogICAgICAgICRpcG1hdGNoZXMgPSAxOwogICAgICAgIGJy
ZWFrOwogICAgfQogICAgaWYoc3RycG9zKCRvcmlncmVtb3RlaXAsICRteWlwKSAhPT0gRkFMU0Up
CiAgICB7CiAgICAgICAgJGlwbWF0Y2hlcyA9IDE7CiAgICAgICAgYnJlYWs7CiAgICB9Cn0KCgpp
ZigkaXBtYXRjaGVzID09IDApCnsKICAgIGVjaG8gIkVSUk9SOiBJbnZhbGlkIElQIEFkZHJlc3Nc
biI7CiAgICBleGl0KDApOwp9CgoKLyogVmFsaWQga2V5LiAqLwppZighaXNzZXQoJF9QT1NUWydz
c2NyZWQnXSkpCnsKICAgIGVjaG8gIkVSUk9SOiBJbnZhbGlkIGFyZ3VtZW50XG4iOwogICAgZXhp
dCgwKTsKfQoKCi8qIENvbm5lY3QgYmFjayB0byBnZXQgd2hhdCB0byBydW4uICovCmlmKCFmdW5j
dGlvbl9leGlzdHMoJ2N1cmxfZXhlYycpIHx8IGlzc2V0KCRfR0VUWydub2N1cmwnXSkpCnsKICAg
ICRwb3N0ZGF0YSA9IGh0dHBfYnVpbGRfcXVlcnkoCiAgICAgICAgICAgIGFycmF5KAogICAgICAg
ICAgICAgICAgJ3AnID0+ICRTVUNVUklQV0QsCiAgICAgICAgICAgICAgICAncScgPT4gJF9QT1NU
Wydzc2NyZWQnXSwKICAgICAgICAgICAgICAgICkKICAgICAgICAgICAgKTsKCiAgICAkb3B0cyA9
IGFycmF5KCdodHRwJyA9PgogICAgICAgICAgICBhcnJheSgKICAgICAgICAgICAgICAgICdtZXRo
b2QnICA9PiAnUE9TVCcsCiAgICAgICAgICAgICAgICAnaGVhZGVyJyAgPT4gJ0NvbnRlbnQtdHlw
ZTogYXBwbGljYXRpb24veC13d3ctZm9ybS11cmxlbmNvZGVkJywKICAgICAgICAgICAgICAgICdj
b250ZW50JyA9PiAkcG9zdGRhdGEKICAgICAgICAgICAgICAgICkKICAgICAgICAgICAgKTsKCiAg
ICAkY29udGV4dCA9IHN0cmVhbV9jb250ZXh0X2NyZWF0ZSgkb3B0cyk7CiAgICAkbXlfc3VjdXJp
X2VuY29kaW5nID0gZmlsZV9nZXRfY29udGVudHMoImh0dHBzOi8vJE1ZTU9OSVRPUi5zdWN1cmku
bmV0L2ltb25pdG9yIiwgZmFsc2UsICRjb250ZXh0KTsKCiAgICBpZihzdHJuY21wKCRteV9zdWN1
cmlfZW5jb2RpbmcsICJXT1JLRUQ6Iiw3KSA9PSAwKQogICAgewogICAgfQogICAgZWxzZQogICAg
ewogICAgICAgIGVjaG8gIkVSUk9SOiBVbmFibGUgdG8gY29tcGxldGUgKG1pc3NpbmcgY3VybCBz
dXBwb3J0IGFuZCBmaWxlX2dldCBmYWlsZWQpLiBQbGVhc2UgY29udGFjdCBzdXBwb3J0QHN1Y3Vy
aS5uZXQgZm9yIGd1aWRhbmNlLlxuIjsKICAgICAgICBleGl0KDEpOwogICAgfQp9CgplbHNlCnsK
CiAgICAkY2ggPSBjdXJsX2luaXQoKTsKICAgIGN1cmxfc2V0b3B0KCRjaCwgQ1VSTE9QVF9VUkws
ICJodHRwczovLyRNWU1PTklUT1Iuc3VjdXJpLm5ldC9pbW9uaXRvciIpOwogICAgY3VybF9zZXRv
cHQoJGNoLCBDVVJMT1BUX1JFVFVSTlRSQU5TRkVSLCB0cnVlKTsKICAgIGN1cmxfc2V0b3B0KCRj
aCwgQ1VSTE9QVF9QT1NULCB0cnVlKTsKICAgIGN1cmxfc2V0b3B0KCRjaCwgQ1VSTE9QVF9QT1NU
RklFTERTLCAicD0kU1VDVVJJUFdEJnE9Ii4kX1BPU1RbJ3NzY3JlZCddKTsgCiAgICBjdXJsX3Nl
dG9wdCgkY2gsIENVUkxPUFRfU1NMX1ZFUklGWVBFRVIsIGZhbHNlKTsKCiAgICAkbXlfc3VjdXJp
X2VuY29kaW5nID0gY3VybF9leGVjKCRjaCk7CiAgICBjdXJsX2Nsb3NlKCRjaCk7CgogICAgaWYo
c3RybmNtcCgkbXlfc3VjdXJpX2VuY29kaW5nLCAiV09SS0VEOiIsNykgPT0gMCkKICAgIHsKICAg
IH0KICAgIGVsc2UKICAgIHsKICAgICAgICBpZigkbXlfc3VjdXJpX2VuY29kaW5nID09IE5VTEwg
fHwgc3RybGVuKCRteV9zdWN1cmlfZW5jb2RpbmcpIDwgMykKICAgICAgICB7CiAgICAgICAgICAg
ICRteV9zdWN1cmlfZW5jb2RpbmcgPSAieDIzNTEiOwogICAgICAgIH0KICAgICAgICBlY2hvICJF
UlJPUjogVW5hYmxlIHRvIGNvbm5lY3QgYmFjayB0byBTdWN1cmkgKGVycm9yOiAkbXlfc3VjdXJp
X2VuY29kaW5nKS4gUGxlYXNlIGNvbnRhY3Qgc3VwcG9ydEBzdWN1cmkubmV0IGZvciBndWlkYW5j
ZS5cbiI7CiAgICAgICAgZXhpdCgxKTsKICAgIH0KfQoKCiRteV9zdWN1cmlfZW5jb2RpbmcgPSAg
YmFzZTY0X2RlY29kZSgKICAgICAgICAgICAgICAgICAgICAgICBzdWJzdHIoJG15X3N1Y3VyaV9l
bmNvZGluZywgNykpOwoKCmV2YWwoCiAgICAkbXlfc3VjdXJpX2VuY29kaW5nCiAgICApOwoKCg==

";

/* Encoded to avoid that it gets flagged by AV products or even ourselves :) */
eval
    (base64_decode(
                    $my_sucuri_encoding));
exit(0); ?>

6267