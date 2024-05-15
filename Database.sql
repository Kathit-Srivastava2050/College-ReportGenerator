show databases;
create database test1;
use test1;

show tables;
desc img_storage;
desc speakers;
desc testdata;
desc users;

drop table img_storage ;
drop table speakers;
drop table testdata;
drop table users;

create table testdata(id int auto_increment primary key, actType varchar(255), actTitle varchar(255), actDate varchar(255), actTimeStart varchar(255), actTimeEnd varchar(255), actVenue varchar(255), actSponsor varchar(255), 
             actParticipantsType varchar(255), actParticipantsNo varchar(255), actTeacherParticipantsNo varchar(255), actStudentParticipantsNo varchar(255), 
             actMaleParticipantsNo varchar(255), actFemaleParticipantsNo varchar(255), actHighlights longtext, actKeyTakeaways longtext, actSummary longtext, 
             actPlan longtext, actRapporteurName varchar(255), actRapporteurEmail varchar(255), actRapporteurContact varchar(255), actDescReport longtext, actSpeakerPresentationTitle varchar(255));
             
create table img_storage(id int, event_name varchar(255), image_data longblob, datatype varchar(255), imagetype varchar(255));

create table speakers(id int, event_name varchar(255), actSpeakerName varchar(255), actSpeakerPosition varchar(255), actSpeakerOrganization varchar(255));

create table users(userId int, userName varchar(255), userPassword varchar(255));

create table transactions(transaction_id int auto_increment primary key, user_id int, username varchar(255), eventname varchar(255), date_of_generation longtext);



select * from transactions;
select * from testdata;
select * from speakers;
select * from img_storage;
select * from users;

truncate testdata;
truncate speakers;
truncate img_storage;
truncate transactions;
truncate users;



desc users;
show tables;







