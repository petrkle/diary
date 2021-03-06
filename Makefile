YEAR:=$(shell date -d 'next year' +%Y)
LANG:=cs_CZ

pdf:
	./months.php ${YEAR} ${LANG}
	cp diary.tex diary-${YEAR}.${LANG}.tex
	pdflatex -interaction=batchmode diary-${YEAR}.${LANG}.tex

clean:
	rm -rf month-* diary-* *.log
