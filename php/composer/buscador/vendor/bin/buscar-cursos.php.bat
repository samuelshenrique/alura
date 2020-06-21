@ECHO OFF
setlocal DISABLEDELAYEDEXPANSION
SET BIN_TARGET=%~dp0/../samuelsantos99/buscador-cursos/buscar-cursos.php
php "%BIN_TARGET%" %*
