## Configure providers
terraform {
  required_providers {
    aws = {
      source  = "hashicorp/aws"
      version = ">= 5.0.0"
    }
  }
  backend "s3" {
    encrypt = true
  }

  required_version = ">= 1.2.0"
}

provider "aws" {
  profile = "dtbs"
  region  = "eu-west-2"
}