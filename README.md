# Monzo library

A PHP library representing data retrieved from Monzo's API.

## Introduction
This library assists with enumerating responses from Monzo's APIs into pure PHP value objects. 

## Installation

Installation is recommended using [`composer`][composer]:

```bash
composer require shamiln/monzo
```

## Usage

The library is separated into three domains of responses currently offered by Monzo's APIs:

### Account
This comprises of a repository which can fetch a collection of `Account` items pertinent for the authentication token.

### Balance
For a given `Account`, the balance can be fetched. This only shows the overall balance, spend and currency.

### Transaction
With a given `Account`, a collection of `Transaction` items can be fetched. These contain information such as the entity name, address, amounts and settlement.