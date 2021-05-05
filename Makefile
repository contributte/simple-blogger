.PHONY: install tests coverage-clover coverage-html

install:
	composer update

tests:
	vendor/bin/tester tests/Blogger -s -p php -c tests/php-unix.ini

coverage-clover:
	vendor/bin/tester -s -p phpdbg -c tests/php-unix.ini --coverage ./coverage.xml --coverage-src ./src tests/Blogger

coverage-html:
	vendor/bin/tester -s -p phpdbg -c tests/php-unix.ini --coverage ./coverage.html --coverage-src ./src tests/Blogger
