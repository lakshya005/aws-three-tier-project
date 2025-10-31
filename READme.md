{\rtf1\ansi\ansicpg1252\cocoartf2865
\cocoatextscaling0\cocoaplatform0{\fonttbl\f0\froman\fcharset0 Times-Bold;\f1\froman\fcharset0 Times-Roman;\f2\froman\fcharset0 Times-Italic;
\f3\fmodern\fcharset0 Courier;\f4\fmodern\fcharset0 Courier-Bold;}
{\colortbl;\red255\green255\blue255;\red0\green0\blue0;}
{\*\expandedcolortbl;;\cssrgb\c0\c0\c0;}
{\*\listtable{\list\listtemplateid1\listhybrid{\listlevel\levelnfc23\levelnfcn23\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace360\levelindent0{\*\levelmarker \{disc\}}{\leveltext\leveltemplateid1\'01\uc0\u8226 ;}{\levelnumbers;}\fi-360\li720\lin720 }{\listname ;}\listid1}
{\list\listtemplateid2\listhybrid{\listlevel\levelnfc23\levelnfcn23\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace360\levelindent0{\*\levelmarker \{disc\}}{\leveltext\leveltemplateid101\'01\uc0\u8226 ;}{\levelnumbers;}\fi-360\li720\lin720 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace360\levelindent0{\*\levelmarker \{decimal\}}{\leveltext\leveltemplateid102\'01\'01;}{\levelnumbers\'01;}\fi-360\li1440\lin1440 }{\listname ;}\listid2}
{\list\listtemplateid3\listhybrid{\listlevel\levelnfc23\levelnfcn23\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace360\levelindent0{\*\levelmarker \{disc\}}{\leveltext\leveltemplateid201\'01\uc0\u8226 ;}{\levelnumbers;}\fi-360\li720\lin720 }{\listname ;}\listid3}
{\list\listtemplateid4\listhybrid{\listlevel\levelnfc23\levelnfcn23\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace360\levelindent0{\*\levelmarker \{disc\}}{\leveltext\leveltemplateid301\'01\uc0\u8226 ;}{\levelnumbers;}\fi-360\li720\lin720 }{\listlevel\levelnfc23\levelnfcn23\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace360\levelindent0{\*\levelmarker \{circle\}}{\leveltext\leveltemplateid302\'01\uc0\u9702 ;}{\levelnumbers;}\fi-360\li1440\lin1440 }{\listname ;}\listid4}
{\list\listtemplateid5\listhybrid{\listlevel\levelnfc23\levelnfcn23\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace360\levelindent0{\*\levelmarker \{disc\}}{\leveltext\leveltemplateid401\'01\uc0\u8226 ;}{\levelnumbers;}\fi-360\li720\lin720 }{\listname ;}\listid5}}
{\*\listoverridetable{\listoverride\listid1\listoverridecount0\ls1}{\listoverride\listid2\listoverridecount0\ls2}{\listoverride\listid3\listoverridecount0\ls3}{\listoverride\listid4\listoverridecount0\ls4}{\listoverride\listid5\listoverridecount0\ls5}}
\margl1440\margr1440\vieww50660\viewh24780\viewkind0
\deftab720
\pard\pardeftab720\sa321\partightenfactor0

\f0\b\fs48 \cf0 \expnd0\expndtw0\kerning0
\outl0\strokewidth0 \strokec2 AWS 3-Tier Web Application Project\
\pard\pardeftab720\sa240\partightenfactor0

\f1\b0\fs24 \cf0 This repository documents the construction of a highly available, secure, and scalable three-tier web application using core AWS services. This project was built manually in the AWS Management Console to demonstrate a foundational understanding of enterprise-level cloud architecture.\
The application serves a simple PHP page that connects to a private MySQL database, proving connectivity across all three isolated tiers.\
\pard\pardeftab720\sa298\partightenfactor0

\f0\b\fs36 \cf0 Project Architecture\
\pard\pardeftab720\sa240\partightenfactor0

\f1\b0\fs24 \cf0 The architecture consists of three distinct tiers, all deployed within a custom Amazon VPC spanning two Availability Zones (AZs) for high availability and fault tolerance.\
\pard\pardeftab720\sa240\partightenfactor0

\f2\i \cf0 (Image from "5 AWS Projects To Get You Hired" PDF)
\f1\i0 \
\pard\pardeftab720\sa280\partightenfactor0

\f0\b\fs28 \cf0 1. Presentation Tier (Public)\
\pard\tx220\tx720\pardeftab720\li720\fi-720\sa240\partightenfactor0
\ls1\ilvl0
\fs24 \cf0 \kerning1\expnd0\expndtw0 \outl0\strokewidth0 {\listtext	\uc0\u8226 	}\expnd0\expndtw0\kerning0
\outl0\strokewidth0 \strokec2 Service:
\f1\b0  Application Load Balancer (ALB)\
\ls1\ilvl0
\f0\b \kerning1\expnd0\expndtw0 \outl0\strokewidth0 {\listtext	\uc0\u8226 	}\expnd0\expndtw0\kerning0
\outl0\strokewidth0 \strokec2 Security:
\f1\b0  The ALB is placed in two 
\f0\b public subnets
\f1\b0  and is protected by its own security group (
\f3\fs26 lb-sg
\f1\fs24 ).\
\ls1\ilvl0
\f0\b \kerning1\expnd0\expndtw0 \outl0\strokewidth0 {\listtext	\uc0\u8226 	}\expnd0\expndtw0\kerning0
\outl0\strokewidth0 \strokec2 Function:
\f1\b0  This is the 
\f2\i only
\f1\i0  component accessible from the public internet (on port 80). It accepts incoming HTTP requests and routes them to the Application Tier.\
\pard\pardeftab720\sa280\partightenfactor0

\f0\b\fs28 \cf0 2. Application Tier (Private)\
\pard\tx220\tx720\pardeftab720\li720\fi-720\sa240\partightenfactor0
\ls2\ilvl0
\fs24 \cf0 \kerning1\expnd0\expndtw0 \outl0\strokewidth0 {\listtext	\uc0\u8226 	}\expnd0\expndtw0\kerning0
\outl0\strokewidth0 \strokec2 Service:
\f1\b0  EC2 Instances within an Auto Scaling Group (ASG)\
\ls2\ilvl0
\f0\b \kerning1\expnd0\expndtw0 \outl0\strokewidth0 {\listtext	\uc0\u8226 	}\expnd0\expndtw0\kerning0
\outl0\strokewidth0 \strokec2 Security:
\f1\b0  Instances are deployed in two 
\f0\b private subnets
\f1\b0 . They cannot be accessed directly from the internet.\
\ls2\ilvl0
\f0\b \kerning1\expnd0\expndtw0 \outl0\strokewidth0 {\listtext	\uc0\u8226 	}\expnd0\expndtw0\kerning0
\outl0\strokewidth0 \strokec2 Security Group (
\f4\fs26 app-sg
\f0\fs24 ):
\f1\b0  This group only allows two types of inbound traffic:\
\pard\tx940\tx1440\pardeftab720\li1440\fi-1440\sa240\partightenfactor0
\ls2\ilvl1\cf0 \kerning1\expnd0\expndtw0 \outl0\strokewidth0 {\listtext	1	}\expnd0\expndtw0\kerning0
\outl0\strokewidth0 \strokec2 Port 80 (HTTP) from the Load Balancer's security group (
\f3\fs26 lb-sg
\f1\fs24 ).\
\ls2\ilvl1\kerning1\expnd0\expndtw0 \outl0\strokewidth0 {\listtext	2	}\expnd0\expndtw0\kerning0
\outl0\strokewidth0 \strokec2 Port 22 (SSH) from my personal IP for administration.\
\pard\tx220\tx720\pardeftab720\li720\fi-720\sa240\partightenfactor0
\ls2\ilvl0
\f0\b \cf0 \kerning1\expnd0\expndtw0 \outl0\strokewidth0 {\listtext	\uc0\u8226 	}\expnd0\expndtw0\kerning0
\outl0\strokewidth0 \strokec2 Function:
\f1\b0  Hosts the Apache web server and the 
\f3\fs26 index.php
\f1\fs24  application. The Auto Scaling Group ensures that a minimum of two instances are always running (one in each AZ).\
\pard\pardeftab720\sa280\partightenfactor0

\f0\b\fs28 \cf0 3. Data Tier (Private)\
\pard\tx220\tx720\pardeftab720\li720\fi-720\sa240\partightenfactor0
\ls3\ilvl0
\fs24 \cf0 \kerning1\expnd0\expndtw0 \outl0\strokewidth0 {\listtext	\uc0\u8226 	}\expnd0\expndtw0\kerning0
\outl0\strokewidth0 \strokec2 Service:
\f1\b0  Amazon RDS (MySQL)\
\ls3\ilvl0
\f0\b \kerning1\expnd0\expndtw0 \outl0\strokewidth0 {\listtext	\uc0\u8226 	}\expnd0\expndtw0\kerning0
\outl0\strokewidth0 \strokec2 Security:
\f1\b0  The database is deployed in two 
\f0\b private subnets
\f1\b0  (in a separate "data" layer).\
\ls3\ilvl0
\f0\b \kerning1\expnd0\expndtw0 \outl0\strokewidth0 {\listtext	\uc0\u8226 	}\expnd0\expndtw0\kerning0
\outl0\strokewidth0 \strokec2 Security Group (
\f4\fs26 db-sg
\f0\fs24 ):
\f1\b0  This is the most secure tier. It only allows inbound traffic on port 3306 (MySQL) 
\f2\i from the Application Tier's security group
\f1\i0  (
\f3\fs26 app-sg
\f1\fs24 ).\
\ls3\ilvl0
\f0\b \kerning1\expnd0\expndtw0 \outl0\strokewidth0 {\listtext	\uc0\u8226 	}\expnd0\expndtw0\kerning0
\outl0\strokewidth0 \strokec2 Function:
\f1\b0  Provides a managed MySQL database. The application servers connect to this database using its private endpoint.\
\pard\pardeftab720\sa298\partightenfactor0

\f0\b\fs36 \cf0 Implementation Highlights\
\pard\pardeftab720\sa280\partightenfactor0

\fs28 \cf0 Security & Network Isolation\
\pard\tx220\tx720\pardeftab720\li720\fi-720\sa240\partightenfactor0
\ls4\ilvl0
\fs24 \cf0 \kerning1\expnd0\expndtw0 \outl0\strokewidth0 {\listtext	\uc0\u8226 	}\expnd0\expndtw0\kerning0
\outl0\strokewidth0 \strokec2 VPC & Subnets:
\f1\b0  Created a custom VPC (
\f3\fs26 10.0.0.0/16
\f1\fs24 ) with a public/private subnet in each of two AZs.\
\ls4\ilvl0
\f0\b \kerning1\expnd0\expndtw0 \outl0\strokewidth0 {\listtext	\uc0\u8226 	}\expnd0\expndtw0\kerning0
\outl0\strokewidth0 \strokec2 Security Groups:
\f1\b0  Implemented the "principle of least privilege" by having security groups reference 
\f2\i each other
\f1\i0 . For example, the Data Tier only trusts the Application Tier, not an IP address.\
\ls4\ilvl0
\f0\b \kerning1\expnd0\expndtw0 \outl0\strokewidth0 {\listtext	\uc0\u8226 	}\expnd0\expndtw0\kerning0
\outl0\strokewidth0 \strokec2 Network Routing:
\f1\b0 \
\pard\tx940\tx1440\pardeftab720\li1440\fi-1440\sa240\partightenfactor0
\ls4\ilvl1
\f0\b \cf0 \kerning1\expnd0\expndtw0 \outl0\strokewidth0 {\listtext	\uc0\u9702 	}\expnd0\expndtw0\kerning0
\outl0\strokewidth0 \strokec2 Public Route Table:
\f1\b0  Has a route (
\f3\fs26 0.0.0.0/0
\f1\fs24 ) to an 
\f0\b Internet Gateway (IGW)
\f1\b0 .\
\ls4\ilvl1
\f0\b \kerning1\expnd0\expndtw0 \outl0\strokewidth0 {\listtext	\uc0\u9702 	}\expnd0\expndtw0\kerning0
\outl0\strokewidth0 \strokec2 Private Route Table:
\f1\b0  Has a route (
\f3\fs26 0.0.0.0/0
\f1\fs24 ) to a 
\f0\b NAT Gateway
\f1\b0  to allow instances to download updates without being exposed to the internet.\
\pard\pardeftab720\sa280\partightenfactor0

\f0\b\fs28 \cf0 High Availability & Scalability\
\pard\tx220\tx720\pardeftab720\li720\fi-720\sa240\partightenfactor0
\ls5\ilvl0
\fs24 \cf0 \kerning1\expnd0\expndtw0 \outl0\strokewidth0 {\listtext	\uc0\u8226 	}\expnd0\expndtw0\kerning0
\outl0\strokewidth0 \strokec2 Multi-AZ Deployment:
\f1\b0  All tiers span two Availability Zones to protect against a single data center failure.\
\ls5\ilvl0
\f0\b \kerning1\expnd0\expndtw0 \outl0\strokewidth0 {\listtext	\uc0\u8226 	}\expnd0\expndtw0\kerning0
\outl0\strokewidth0 \strokec2 Auto Scaling Group:
\f1\b0  Automatically maintains the health and number of application servers. If an instance fails, the ASG terminates it and launches a new one.\
\ls5\ilvl0
\f0\b \kerning1\expnd0\expndtw0 \outl0\strokewidth0 {\listtext	\uc0\u8226 	}\expnd0\expndtw0\kerning0
\outl0\strokewidth0 \strokec2 Application Load Balancer:
\f1\b0  Distributes traffic evenly across the healthy instances in the ASG.\
}