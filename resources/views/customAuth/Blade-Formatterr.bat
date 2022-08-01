@echo on
set dirpath=%1
rem echo %dirpath%
rem pause
cd %dirpath%
rem pause
blade-formatter --write *.blade.php && pause
exit
