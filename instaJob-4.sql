-- Start of SQL Script --
-- ******************* --
-- Project Phase II

-- PART A --
-- USERS - For user's login
CREATE TABLE USERS (
	Id INT NOT NULL,
	FName VARCHAR(20) NOT NULL,
	LName VARCHAR(20) NOT NULL,
	Gender CHAR(1) NOT NULL,
	Email VARCHAR(40) NOT NULL,
	Phone INT,
	Password VARCHAR(20) NOT NULL,
	Repassword VARCHAR(20) NOT NULL,
	user_type VARCHAR(20),
	PRIMARY KEY (Id)
);

-- RESUME - storing users' resume
CREATE TABLE RESUME (

	Id INT NOT NULL,
	Resume_path VARCHAR(60),
	Skills VARCHAR(100),

	PRIMARY KEY(Id),
	FOREIGN KEY(Id) REFERENCES USERS(Id)
);

-- COMPANY - company's information
CREATE TABLE COMPANY(

	Job_ID INT NOT NULL,
	CName VARCHAR(20) NOT NULL,
	Location VARCHAR(50) NOT NULL,

	PRIMARY KEY(Job_Id)
);


-- JOB- job's description
CREATE TABLE JOB(

	Job_ID INT NOT NULL,
	Title VARCHAR(50) NOT NULL,
	Description VARCHAR(200) NOT NULL,
	Salary DECIMAL NOT NULL,

	PRIMARY KEY(Job_ID),
	FOREIGN KEY(Job_ID) REFERENCES COMPANY(Job_ID)
);

-- RECRUITER- recruiter's information
CREATE TABLE RECRUITER (

	Id INT NOT NULL,
	Company_Name VARCHAR(20) NOT NULL,
	Company_Location VARCHAR(50) NOT NULL,
	Department VARCHAR(20) NOT NULL,

	PRIMARY KEY(Id),
	FOREIGN KEY(Id) REFERENCES USERS(Id)

);
