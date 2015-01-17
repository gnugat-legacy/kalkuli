# Kalkuli

Helps me with my money.

## Installation

    git clone https://github.com/gnugat/kalkuli
    cd kalkuli
    make
    make install

## Configuration

    php app/console add:account Checking
    php app/console add:tag Groceries
    php app/console add:tag Spending
    php app/console add:tag-matcher Groceries '/^TESCO/'
    php app/console add:monthly-limit Groceries '-120.00£' Checking

## Usage

    php app/console add:transaction 'TESCO STORES 2568 CD 7811' '-3.25£' Checking

## Features

* [x] Add Account
* [x] Set default Account
* [x] Add Transaction
* [x] Add Tag
* [x] Tag Transaction
* [ ] Untag Transation
* [x] Add TagMatcher
* [x] Add MonthyLimit
