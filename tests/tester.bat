@echo off
%CD%\..\vendor\bin\tester.bat %CD%\Blogger -s -j 40 -log %CD%\tester.log %*
rmdir %CD%\tmp /Q /S
