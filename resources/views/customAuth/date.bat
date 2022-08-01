@echo on

set hh=%time:~-11,2%
set /a hh=%hh%+100
set hh=%hh:~1%
rem Set mydir=%date:~10,4%-%date:~4,2%-%date:~7,2%-%hh%-%time:~3,2%-%time:~6,2%
Set mydir=%date:~0,2%-%date:~3,3%-%date:~7,4%-%hh%-%time:~3,2%-%time:~6,2%
mkdir Copy_%mydir%
xcopy .\*.blade.php .\Copy_%mydir%\
blade-formatter --write *.blade.php && pause
exit
rem Set mydir=%date:~0,2%-%date:~0,3%-%date:~0,2%-%hh%-%time:~3,2%-%time:~6,2%