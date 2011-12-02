YEAR=2012

diar:
	./months.php ${YEAR}
	cp diary.tex diary-${YEAR}.tex
	pdflatex -interaction=batchmode diary-${YEAR}.tex

clean:
	rm -rf month-* diary-*
