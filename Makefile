diar:
	./mesice.php
	pdflatex -interaction=batchmode diar.tex

clean:
	rm -rf mesic-* diar.log diar.aux diar.pdf
