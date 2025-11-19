AWS 3-Tier Web Application Project

This repository showcases a classic 3-Tier Web Application, fully deployed on AWS. It's a hands-on project demonstrating a robust, secure, and scalable architecture—the foundational pattern for modern enterprise applications.

This architecture is built from the ground up to be highly available and fault-tolerant, featuring isolated network layers, security-first principles, and automated scaling. The result is a secure application, built manually in the AWS console, that can withstand data center failures and automatically handle varying traffic loads.

Project Architecture

The architecture consists of three distinct tiers, all deployed within a custom Amazon VPC spanning two Availability Zones (AZs) for high availability and fault tolerance.

<img width="1280" height="582" alt="image" src="https://github.com/user-attachments/assets/bf19bd05-1af1-4883-b705-fcc4c59a1921" />


1. Presentation Tier (Public)

Service: Application Load Balancer (ALB)

Security: The ALB is placed in two public subnets and is protected by its own security group (lb-sg).

Function: This is the only component accessible from the public internet (on port 80). It accepts incoming HTTP requests and routes them to the Application Tier.

2. Application Tier (Private)

Service: EC2 Instances within an Auto Scaling Group (ASG)

Security: Instances are deployed in two private subnets. They cannot be accessed directly from the internet.

Security Group (app-sg): This group only allows two types of inbound traffic:

Port 80 (HTTP) from the Load Balancer's security group (lb-sg).

Port 22 (SSH) from my personal IP for administration.

Function: Hosts the Apache web server and the index.php application. The Auto Scaling Group ensures that a minimum of two instances are always running (one in each AZ).

3. Data Tier (Private)

Service: Amazon RDS (MySQL)

Security: The database is deployed in two private subnets (in a separate "data" layer).

Security Group (db-sg): This is the most secure tier. It only allows inbound traffic on port 3306 (MySQL) from the Application Tier's security group (app-sg).

Function: Provides a managed MySQL database. The application servers connect to this database using its private endpoint.

Implementation Highlights

Security & Network Isolation

VPC & Subnets: Created a custom VPC (10.0.0.0/16) with a public/private subnet in each of two AZs.

Security Groups: Implemented the "principle of least privilege" by having security groups reference each other. For example, the Data Tier only trusts the Application Tier, not an IP address.

Network Routing:

Public Route Table: Has a route (0.0.0.0/0) to an Internet Gateway (IGW).

Private Route Table: Has a route (0.0.0.0/0) to a NAT Gateway to allow instances to download updates without being exposed to the internet.

High Availability & Scalability

Multi-AZ Deployment: All tiers span two Availability Zones to protect against a single data center failure.

Auto Scaling Group: Automatically maintains the health and number of application servers. If an instance fails, the ASG terminates it and launches a new one.

Application Load Balancer: Distributes traffic evenly across the healthy instances in the ASG.
