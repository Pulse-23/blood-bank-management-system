-- -------ADMIN TABLE------------------------
create table admin(
    id int(2) auto_increment primary key,
    first_name varchar(20),
    last_name varchar(20), 
    gender varchar(10),
    dob date,
    phoneno varchar(10),
    username varchar(50) not null,
    pwd varchar(20) not null
)


insert into admin values ('Bharagvi', 'Madhavan', 'Female', '2000-10-11', 8056978222, 'bhargavi11102000@gmail.com', 'bharpwd123');
insert into admin values ('Nikkitha', 'G S', 'Female', '2000-08-08', 9840589649, 'gsnikkitha88@gmail.com', 'nikkpwd123');








-- --------USERS TABLE--------------------
create table users(
    userid int(5) auto_increment primary key,
    first_name varchar(20),
    last_name varchar(20),
    gender varchar(10),
    dob date,
    phoneno varchar(10),
    username varchar(50),
    pwd varchar(20),
    role varchar(20)
)






-- ---------------------BLOOD BANK TABLE-----------------------------
create table bloodbank(
    bloodbankid int(5) auto_increment primary key,
    name varchar(30),
    country varchar(15),
    state varchar(15),
    city varchar(15)
)
alter table bloodbank drop country;
insert into bloodbank (name, state, city) values ('Rotary Blood Bank', 'Delhi', 'New Delhi');
insert into bloodbank (name, state, city) values ('Indian Red Cross Society', 'Delhi', 'New Delhi');
insert into bloodbank (name, state, city) values ('Blood Connect Foundation', 'Delhi', 'New Delhi');
insert into bloodbank (name, state, city) values ('Khoon Organisation', 'Karnataka', 'Bengaluru');
insert into bloodbank (name, state, city) values ('Sankalp India Foundation', 'Karnataka', 'Bengaluru');
insert into bloodbank (name, state, city) values ('Lions Blood Bank', 'Tamil Nadu', 'Chennai');
insert into bloodbank (name, state, city) values ('Think Foundation', 'Maharashtra', 'Mumbai');
insert into bloodbank (name, state, city) values ('Athar', 'Maharashtra', 'Mumbai');
insert into bloodbank (name, state, city) values ('Voluntary Health Services', 'Tamil Nadu', 'Chennai');
insert into bloodbank (name, state, city) values ('Ramakrishna Mission Seva Prathishthan', 'West Bengal', 'Kolkatta');
insert into bloodbank (name, state, city) values ('Jeeva Dhara Voluntary Blood Bank', 'Telangana', 'Hyderabad');
insert into bloodbank (name, state, city) values ('Bharat Blood Bank', 'Tamil Nadu', 'Chennai');
insert into bloodbank (name, state, city) values ('VHS Blood Bank', 'Tamil Nadu', 'Chennai');
insert into bloodbank (name, state, city) values ('Cauvery Blood Bank', 'Telangana', 'Hyderabad');
insert into bloodbank (name, state, city) values ('NIMS Blood Bank', 'Telangana', 'Hyderabad');
insert into bloodbank (name, state, city) values ('Life Care Blood Bank', 'West Bengal', 'Kolkatta');
insert into bloodbank (name, state, city) values ('Indian Blood Bank', 'West Bengal', 'Kolkatta');
insert into bloodbank (name, state, city) values ('Borivali Blood Bank', 'Maharashtra', 'Mumbai');
insert into bloodbank (name, state, city) values ('Navjivan Blood Bank And Lab', 'Maharashtra', 'Mumbai');
insert into bloodbank (name, state, city) values ('Samarpan Blood Bank', 'Maharashtra', 'Mumbai');


-- ------------------------------HOSPITAL TABLE----------------------------------
create table Hospital(
    hospitalid int(5) auto_increment primary key,
    name varchar(30),
    country varchar(15),
    state varchar(15),
    city varchar(15)
)
alter table hospital drop country;
insert into hospital(name, state, city) values ('AIIMS', 'Delhi', 'New Delhi');
insert into hospital(name, state, city) values ('Fortis', 'West Bengal', 'Kolkatta');
insert into hospital(name, state, city) values ('Indraprastha Apollo', 'Delhi', 'New Delhi');
insert into hospital(name, state, city) values ('Lilavati', 'Maharashta', 'Mumbai');
insert into hospital(name, state, city) values ('CMC', 'Tamil Nadu', 'Vellore');
insert into hospital(name, state, city) values ('TATA Memorial', 'Maharashtra', 'Mumbai');
insert into hospital(name, state, city) values ('JIPMER', 'Pudhucherry', 'Pudhucherry');
insert into hospital(name, state, city) values ('Sankara Netralaya', 'Tamil Nadu', 'Chennai');
insert into hospital(name, state, city) values ('Kokilaben', 'Maharashtra', 'Mumbai');
insert into hospital(name, state, city) values ('Manipal', 'Karnataka', 'Bengaluru');
insert into hospital(name, state, city) values ('Apollo', 'Karnataka', 'Bengaluru');
insert into hospital(name, state, city) values ('Aditya Birla', 'Maharashtra', 'Pune');
insert into hospital(name, state, city) values ('Billroth', 'Tamil Nadu', 'Chennai');
insert into hospital(name, state, city) values ('Columbia Asia', 'West Bengal', 'Kolkatta');
insert into hospital(name, state, city) values ('Kamineni', 'Telangana', 'Hyderabad');
insert into hospital(name, state, city) values ('Fortis Malar', 'Tamil Nadu', 'Chennai');
insert into hospital(name, state, city) values ('SRMC', 'Tamil Nadu', 'Chennai');
insert into hospital(name, state, city) values ('Apollo Gleneagles', 'West Bengal', 'Kolkatta');
insert into hospital(name, state, city) values ('CARE Foundation', 'Telangana', 'Hyderabad');
insert into hospital(name, state, city) values ('NIMHANS', 'Karnataka', 'Bengaluru');




-- -----------BLOOD BANK POC TABLE-----------------------
create table bloodbankPOC(
    bloodBankPOCid int(5) auto_increment primary key,
    bloodBankid int(5),
    userid int(5),
    foreign key(bloodBankid) references bloodbank(bloodBankid),
    foreign key(userid) references users(userid)
)







-- --------------HOSPITAL POC TABLE------------------------------
create table hospitalPOC(
    hospitalPOCid int(5) auto_increment primary key,
    hospitalid int(5),
    userid int(5),
    foreign key(hospitalid) references hospital(hospitalid),
    foreign key(userid) references users(userid)
)





-- ---------------------DONORS TABLE----------------------------------------------
create table donor(
    donorid int(5) auto_increment primary key,
    first_name varchar(20),
    last_name varchar(20),
    gender varchar(10),
    dob date,
    phoneno varchar(10),
    country varchar(15),
    state varchar(15),
    city varchar(15),
    bloodGroup varchar(8),
    totalQuantity int(5),
    usedQuantity int(5),
    remainingQuantity int(5)
)



-- ---------------------------BLOOD BAG TABLE-----------------------------------------------
create table bloodBag(
    bloodBagid int(5) auto_increment primary key,
    bloodgroup varchar(8),
    bstatus varchar(15),
    donorid int(5),
    foreign key(donorid) references donor(donorid),
    bbid int(5),
    foreign key(bbid) references bloodBank(bloodbankid)
)





-- ---------------------------DEMAND TABLE-----------------------------------------------
create table demand(
    demandid int(5) auto_increment primary key,
    requiredno int(3),
    bloodGroup varchar(8),
    dstatus varchar(10),
    hid int(5),
    foreign key(hid) references hospital(hospitalid)
)






-- -------------------------------PROCEDURES--------------------------------------------------
--1 
delimiter $
create procedure insertIntoUsers (IN first_name varchar(20), IN last_name varchar(20), IN gender varchar(10), IN dob date, IN phoneno varchar(10), IN username varchar(50), IN pwd varchar(20), IN role varchar(20))
BEGIN
    insert into users (first_name, last_name, gender, dob, phoneno, username, pwd, role) values (first_name, last_name, gender, dob, phoneno, username, pwd, role);
end
$




--2
delimiter $
create procedure insertIntoBbpoc (IN bbid int(5), IN userid int(5))
BEGIN
    insert into bloodbankpoc (bloodbankid, userid) values (bbid, userid);
end
$  





--3
delimiter $
create procedure insertIntoHpoc (IN hid int(5), IN userid int(5))
BEGIN
    insert into hospitalpoc (hospitalid, userid) values (hid, userid);
end
$  



--4
delimiter $
create procedure update_password(IN id int(5), IN pwd varchar(20))
BEGIN
    update users set pwd=pwd where userid=id;
end
$   



--5
delimiter $
create procedure update_phno(IN id int(5), IN phno varchar(10))
BEGIN
    update users set phoneno=phno where userid=id;
end
$     



--6
delimiter $
create procedure delete_bbpoc(IN id int(5))
BEGIN
    delete from bloodbankpoc where userid =id;
end
$    



--7
delimiter $
create procedure delete_hpoc(IN id int(5))
BEGIN
    delete from hospitalpoc where userid =id;
end
$  


--8 
delimiter $
create procedure insertIntoDonor (IN first_name varchar(20), IN last_name varchar(20), IN gender varchar(10), IN dob date, IN phoneno varchar(10), IN country varchar(15), IN state varchar(15), IN city varchar(15), IN bgroup varchar(8), IN totalq int(5), IN usedq int(5), IN remq int(5))
BEGIN
    insert into donor (first_name, last_name, gender, dob, phoneno, country, state, city, bloodGroup, totalQuantity, usedQuantity, remainingQuantity) values (first_name, last_name, gender, dob, phoneno, country, state, city, bgroup, totalq, usedq, remq);
end
$




--9 
delimiter $
create procedure updateDonor (IN totalq int(5), IN remq int(5), IN phonenumber varchar(10))
BEGIN
    update donor set totalQuantity=totalq, remainingQuantity=remq where phoneno=phonenumber;
end
$



--10
delimiter $
create procedure insertIntoBloodBag (IN b_status varchar(15), IN donorid int(5), IN bbid int(5), IN bloodgroup varchar(8))
BEGIN
    insert into bloodBag (bstatus, donorid, bbid, bloodgroup) values (b_status, donorid, bbid, bloodgroup);
end
$ 



--11
delimiter $
create procedure delete_user(IN id int(5))
BEGIN
    delete from users where userid=id;
end
$ 


--12
delimiter $
create procedure donor_det(IN bbankid int(5))
BEGIN
    SELECT 
        distinct(b.donorid),
        d.first_name, 
        d.last_name,
        d.gender,
        d.dob,
        d.phoneno,
        d.bloodGroup,
        d.totalQuantity,
        d.usedQuantity,
        d.remainingQuantity
    FROM
        bloodbag b
    INNER JOIN donor d
        ON d.donorid = b.donorid
    WHERE b.bbid = bbankid;
end
$


--13
delimiter $
create procedure insertIntoDemand (IN reqno int(3), IN bgroup varchar(8), IN dstatus varchar(10), IN hid int(5))
BEGIN
    insert into demand (requiredno, bloodGroup, dstatus, hid) values (reqno, bgroup, dstatus, hid);
end
$


--14
delimiter $
create procedure demand_det(IN h_id int(5))
BEGIN
    SELECT requiredno, bloodGroup, dstatus from demand where hid=hr_id;
end
$ 


--15 
delimiter $
create procedure addBloodBank(IN bbname varchar(30), IN bbstate varchar(15), IN bbcity varchar(15))
BEGIN
    INSERT into bloodbank(name, state, city) values (bbname, bbstate, bbcity);
end
$


--16
delimiter $
create procedure delBloodBank(IN bbid int(5))
BEGIN
    delete from bloodbank where bloodbankid=bbid;
end
$


--17
delimiter $
create procedure addHospital(IN hname varchar(30), IN hstate varchar(15), IN hcity varchar(15))
BEGIN
    INSERT into hospital(name, state, city) values (hname, hstate, hcity);
end
$


--18
delimiter $
create procedure delHospital(IN hid int(5))
BEGIN
    delete from hospital where hospitalid=hid;
end
$


--19
delimiter $
create procedure count_ (IN blood varchar(8))
BEGIN
    select count(*) from bloodbag where bloodgroup=blood and bstatus='Available';
END
$


--20
delimiter $
create procedure updateBloodbag (IN bbid int(5))
BEGIN
    update bloodbag set bstatus='Used' where  bloodBagid=bbid;
end
$


--21
delimiter $
create procedure updateDonorQty (IN usedq int(5), IN remq int(5), IN did int(5))
BEGIN
    update donor set usedQuantity=usedq, remainingQuantity=remq where donorid=did;
end
$


--22
delimiter $
create procedure updateDemand (IN did int(5))
BEGIN
    update demand set dstatus='Transacted' where  demandid=did;
end
$

--23
delimiter $
create procedure count_demand (IN hid_ int(5), IN bg varchar(8))
BEGIN
    select sum(requiredno) from demand where hid = hid_ and bloodGroup = bg;
END
$
  































--CURSOR TRY
-- get donor id using simple query
delimiter $
create procedure getDonorid(IN bbankid int(5))
BEGIN
    select DISTINCT(donorid) from bloodbag where bbid=bbankid;
end
$ 



-- with cursor
DELIMITER $$
CREATE PROCEDURE donor_details (
    IN donor_id int(5)
)
BEGIN
    DECLARE finished INTEGER DEFAULT 0;
    DECLARE d_fname varchar(20);
    DECLARE d_lname varchar(20);
    DECLARE d_gender varchar(10);
    DECLARE d_dob date;
    DECLARE d_phoneno varchar(10);
    DECLARE d_bloodGroup varchar(8);
    DECLARE d_total int(5);
    DECLARE d_used int(5);
    DECLARE d_remaining int(5);

    -- declare cursor
    DEClARE c_donor_det 
        CURSOR FOR 
            SELECT first_name, last_name, gender, dob, phoneno, bloodGroup, totalQuantity, usedQuantity, remainingQuantity from donor where donorid=donor_id; 
    -- declare NOT FOUND handler
    DECLARE CONTINUE HANDLER 
        FOR NOT FOUND SET finished = 1;
        
    OPEN c_donor_det;
    get_details: LOOP
        FETCH c_donor_det INTO d_fname, d_lname, d_gender, d_dob, d_phoneno,d_bloodGroup,d_total, d_used, d_remaining;
        IF finished = 1 THEN 
            LEAVE get_details;
        END IF;
        select d_fname, d_lname, d_gender, d_dob, d_phoneno,d_bloodGroup,d_total, d_used, d_remaining; 
    END LOOP get_details;
    CLOSE c_donor_det;

END$$
DELIMITER ;




-- without cursor
delimiter $
create procedure donorDetails(IN donor_id int(5))
BEGIN
    SELECT first_name, last_name, gender, dob, phoneno, bloodGroup, totalQuantity, usedQuantity, remainingQuantity from donor where donorid=donor_id;
end
$ 


