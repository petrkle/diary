YEAR=2012
LANG=cs_CZ

diar:
	./months.php ${YEAR} ${LANG}
	cp diary.tex diary-${YEAR}.${LANG}.tex
	pdflatex -interaction=batchmode diary-${YEAR}.${LANG}.tex

clean:
	rm -rf month-* diary-*
