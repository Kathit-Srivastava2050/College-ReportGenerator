use test1;


create table testingtable(name varchar(20));
show tables;
drop table testdata;
drop table img_storage;
drop table speakers;
drop table transactions;
show databases;
show tables;

create table testdata(id int auto_increment primary key, actType varchar(255), actTitle varchar(255), actDate varchar(255), actTimeStart varchar(255), actTimeEnd varchar(255), actVenue varchar(255), actSponsor varchar(255), 
             actParticipantsType varchar(255), actParticipantsNo varchar(255), actTeacherParticipantsNo varchar(255), actStudentParticipantsNo varchar(255), 
             actMaleParticipantsNo varchar(255), actFemaleParticipantsNo varchar(255), actHighlights longtext, actKeyTakeaways longtext, actSummary longtext, 
             actPlan longtext, actRapporteurName varchar(255), actRapporteurEmail varchar(255), actRapporteurContact varchar(255), actDescReport longtext, actSpeakerPresentationTitle varchar(255));
create table img_storage(id int, event_name varchar(255), img_name longtext, imagetype varchar(255));
create table speakers(id int, event_name varchar(255), actSpeakerName varchar(255), actSpeakerPosition varchar(255), actSpeakerOrganization varchar(255));
create table transactions(transaction_id int auto_increment primary key, user_id int, username varchar(255), eventname varchar(255), date_of_generation longtext);
create table users(userId int, userName varchar(255), userPassword varchar(255));

select * from testdata;
select * from speakers;
select * from transactions;
select* from img_storage;

desc img_storage;	
desc speakers;









INSERT INTO users (userId, userName, userPassword) VALUES
(1, 'Dr. BOSCO PAUL ALAPATT', '$2y$10$sOUlxjgexMtsCqh5J6gmwewpwJd4z1P6vgzKCh6TZmFpwyJfNcxFy'),
(2, 'Dr. ASHISH SHARMA', '$2y$10$OgY2SNcl1uiR95m1eruhGOvf/huqWCT2dwVk9THaTkoF3UeNG0J5u
'),
(3, 'Dr. ABHINAV SINGHAL', '$2y$10$o1ipsj5aL8..vJIlzx7AP.TFg5JrdeWdy/NodHH16FpNndOn5XgbK'),
(4, 'Prof. AMRIT KAUR SAGGU', '$2y$10$CvSKo2L9vwLjFeSfLVVk4e8OMz9ADsBwzF5j9fOBV6glTeYHGO0kG'),
(5, 'Dr. ANSA MATHEW', '$2y$10$HYjnm4Z91aadDaCLSo8LGert6/lrX99klvQBsQ9bcM3hRDTpzK7mW'),
(6, 'Dr. ELLUMKALAYIL MERLIN THOMAS', '$2y$10$cvwz/xmZxk.zCm7Vgz45o.fh7fo3kXtAWmti4rq6O33wwAhpEGa26'),
(7, 'Prof. GARIMA ANAND', '$2y$10$A3yD4HWl5UysNIHFLEcGf.piof3l0SRbMzPZ/4ers4QrmPTRcYuoe'),
(8, 'Prof. INDU VERMA', '$2y$10$rZzkIGNAFoSLVqcpMBfYuOrD5vZ6kJ17is17a6CKkymXVDPsrnibu'),
(9, 'Dr. KAMAL UPRETI', '$2y$10$g0JWS1RYRdxompVF48MinuwheRCDU7xHTkJgao/dKPrkDge5l81ni'),
(10, 'Prof. LATA YADAV', '$2y$10$t6b8UK8wpKiBGyetYsiyLO7ilhFS0AAtUGjr3IaE91Gfh7DBfI4iG'),
(11, 'Prof. LAWRENCE KUJUR', '$2y$10$1tV8fgnrDqspMuUNM/to3e3L9L.EuOTz5qnRm.xOWR/.aVtv4Nzgm'),
(12, 'Prof. MADAN SINGH', '$2y$10$LMAvn3KVu6zQuLb/7gt1huyWGGVDepL4liLJXTt5xNqzxRHKAmjpS'),
(13, 'Dr. MANJULA SHANBHOG', '$2y$10$J3fVlzpKWplRQD/.1yjDqeBuzRgcgNj5t05QKvbVX.YYSlrMkou/u'),
(14, 'Prof. NEHA SAINI', '$2y$10$86KUdNgoh6FucT518CfuB.jUsQ.sVazQwgi/LlK1MWGvKNSsyJkiW'),
(15, 'Dr. PREETY', '$2y$10$61XmzDwEnI5mlhws7CDc6eTu1ci1578IxSjbtuJ1Gds54y7KT36PO'),
(16, 'Dr. RAMESH CHANDRA POONIA', '$2y$10$rUZ0axcdaUyf/I7P3A7mYOXDYIUvnUSUwaRVRa0DwtVefG9EMaCbu'),
(17, 'Dr. RIYA BABY', '$2y$10$W44HnkyxAgsFZ9w6uUfKne1d.xotfAj5EPVi8LtchAZW9G0ujKkKa'),
(18, 'Dr. RUCHI KAUSHIK', '$2y$10$RasFtJ89WLGuf6z5bRgPA.d70GpN/dBKATqUn.Wxzc1uBgsfUhVJi'),
(19, 'Dr. SHILPA SRIVASTAVA', '$2y$10$ua72nWTsbLanZlnTYQUtWewgp4SlZzXR5Or22dKoUejNbgusYGHhy'),
(20, 'Dr. STEPHEN RAJ S', '$2y$10$AhaAYZPd7CxcDsTPibMNV.BnMztHQFMbW804GGsWC.Jy6eIdxfbKG'),
(21, 'Dr. SWATI AGRAWAL', '$2y$10$HED.6C2VUdWjhtLW4OqiVeVOz5BgeQ3QkQy3Qmbo/lsXejV5qdfOG'),
(22, 'Prof. VANDANA MEHNDIRATTA', '$2y$10$XdvKw9CO2NpgnJyZWvoxUedgNjraul0x55rgDGfG0ALGF7nnrIVV'),
(23, 'Dr. VANDANA SHARMA', '$2y$10$PFb2xee6JwSLmFDGFPche.KrVCLHK1dFGTlXwX7OcCySAvADvhk/O'),
(24, 'Dr. VARUNA GUPTA', '$2y$10$BRGgiU4fib8BxgYXYSZ9E.bnjC/kd37bsoQY9wFij64KZgrIm7xVq'),
(25, 'Dr. VIDUSHI', '$2y$10$8w0dPoJ52I5KKRZEjsApnef2IjnoPlZ/cayz6xgkYkkxy2w5qMywi');