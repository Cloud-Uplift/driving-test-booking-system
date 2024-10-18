## Configure providers
terraform {
  required_providers {
    aws = {
      source  = "hashicorp/aws"
      version = ">= 5.0.0"
    }
  }

  backend "s3" {
    organization = "clouduplift"
    encrypt = true
    key = "dbts-storage/terraform.tfstate"
    region = "eu-west-2"

    dynamodb_table = "dtbs-dev-state-db"
  }

  required_version = ">= 1.2.0"
}

provider "aws" {
  profile = "daood-cu"
  region  = "eu-west-2"
}