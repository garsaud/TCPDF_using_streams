# TCPDF using streams

[TCPDF](https://github.com/tecnickcom/TCPDF) is a good library for generating small PDFs on the fly. However, the page and file content buffers are stored in RAM through variables, which makes the library unsuitable for heavy processing. It is often necessary to increase the PHP memory limit to avoid exceeding it.

This is fixed in this fork. Storing the file and pages in variables is replaced with writing into stream (through the `php://temp` mechanism, which automatically decides to use RAM or a file). It is now possible to write very large PDF files, save them and display the content, without impacting memory.

## Installing

```bash
composer require garsaud/tcpdf_using_streams
# instead of composer require tecnickcom/tcpdf
```

## The original library

https://github.com/tecnickcom/TCPDF
