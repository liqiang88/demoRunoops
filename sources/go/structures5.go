//结构体作为参数的值传递
package main

import "fmt"

type Books struct {
    title string
    author string
    subject string
    book_id int
}

func changeBook(book Books) {
    book.title = "Go 语言教程"
}

func main() {
    var book1 Books
    book1.title = "Python 语言教程"
    book1.author = "runoops.com"
    book1.book_id = 1
    changeBook(book1)
    fmt.Println(book1)
}