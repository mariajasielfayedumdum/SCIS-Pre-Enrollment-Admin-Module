REM Workbench Table Data copy script
REM Workbench Version: 6.3.9
REM 
REM Execute this to copy table data from a source RDBMS to MySQL.
REM Edit the options below to customize it. You will need to provide passwords, at least.
REM 
REM Source DB: Mysql@127.0.0.1:3306 (MySQL)
REM Target DB: Mysql@127.0.0.1:3306


@ECHO OFF
REM Source and target DB passwords
set arg_source_password=
set arg_target_password=

IF [%arg_source_password%] == [] (
    IF [%arg_target_password%] == [] (
        ECHO WARNING: Both source and target RDBMSes passwords are empty. You should edit this file to set them.
    )
)
set arg_worker_count=2
REM Uncomment the following options according to your needs

REM Whether target tables should be truncated before copy
REM set arg_truncate_target=--truncate-target
REM Enable debugging output
REM set arg_debug_output=--log-level=debug3


REM Creation of file with table definitions for copytable

set table_file="%TMP%\wb_tables_to_migrate.txt"
TYPE NUL > "%TMP%\wb_tables_to_migrate.txt"
ECHO `pre_enrollment`	`users`	`scispre_enrollment`	`users`	`userid`	`userid`	`userid`, `username`, `password`, `name`, `type`, `email`, `idnumber` >> "%TMP%\wb_tables_to_migrate.txt"
ECHO `pre_enrollment`	`offered_subjects`	`scispre_enrollment`	`offered_subjects`	`offeredID`	`offeredID`	`offeredID`, `subjectID`, `course`, `term` >> "%TMP%\wb_tables_to_migrate.txt"
ECHO `pre_enrollment`	`students`	`scispre_enrollment`	`students`	`id_number`	`id_number`	`id_number`, `last_name`, `first_name`, `course`, `year`, `curriculum` >> "%TMP%\wb_tables_to_migrate.txt"
ECHO `pre_enrollment`	`checklist`	`scispre_enrollment`	`checklist`	`checklistID`	`checklistID`	`checklistID`, `coursenumber`, `course`, `units`, `destitle`, `term`, `subyear`, `type` >> "%TMP%\wb_tables_to_migrate.txt"
ECHO `pre_enrollment`	`pre_enroll`	`scispre_enrollment`	`pre_enroll`	`preid`	`preid`	`preid`, `id_number`, `coursenumber`, `term` >> "%TMP%\wb_tables_to_migrate.txt"
ECHO `pre_enrollment`	`overloading`	`scispre_enrollment`	`overloading`	`overloadID`	`overloadID`	`overloadID`, `subjectID`, `id_number`, `status`, `term` >> "%TMP%\wb_tables_to_migrate.txt"
ECHO `pre_enrollment`	`curriculum_checklist`	`scispre_enrollment`	`curriculum_checklist`	`curriculumID`	`curriculumID`	`curriculumID`, `checklistID`, `curYear`, `curriculum` >> "%TMP%\wb_tables_to_migrate.txt"
ECHO `pre_enrollment`	`subjects`	`scispre_enrollment`	`subjects`	`subjectID`	`subjectID`	`subjectID`, `coursenumber`, `destitle`, `units`, `type` >> "%TMP%\wb_tables_to_migrate.txt"
ECHO `pre_enrollment`	`enr_stat`	`scispre_enrollment`	`enr_stat`	`coursenumber`,`term`	`coursenumber`,`term`	`coursenumber`, `term`, `number_of_students` >> "%TMP%\wb_tables_to_migrate.txt"
ECHO `pre_enrollment`	`petitions`	`scispre_enrollment`	`petitions`	`petID`	`petID`	`petID`, `subjectID`, `id_number`, `term` >> "%TMP%\wb_tables_to_migrate.txt"
ECHO `pre_enrollment`	`updated_checklist`	`scispre_enrollment`	`updated_checklist`	`updCheckID`	`updCheckID`	`updCheckID`, `curriculumID`, `status`, `id_number`, `checklistID` >> "%TMP%\wb_tables_to_migrate.txt"


wbcopytables.exe ^
 --mysql-source="root@127.0.0.1:3306" ^
 --target="root@127.0.0.1:3306" ^
 --source-password="%arg_source_password%" ^
 --target-password="%arg_target_password%" ^
 --table-file="%table_file%" --thread-count=%arg_worker_count% ^
 %arg_truncate_target% ^
 %arg_debug_output%

REM Removes the file with the table definitions
DEL "%TMP%\wb_tables_to_migrate.txt"


