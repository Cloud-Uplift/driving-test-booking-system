#VPC
resource "aws_vpc" "vpc" {
  cidr_block           = "192.68.79.0/24"
  enable_dns_hostnames = true
  enable_dns_support   = true
  tags = {
    Name        = "vpc-dtbs-dev-cu"
    Project     = "DTBS"
  }
}
