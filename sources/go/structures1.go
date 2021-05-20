//结构体实例1
package main

import "fmt"

type Books struct {
   title string
   author string
   subject string
   book_id int
}


func main() {

    // 创建一个新的结构体
    fmt.Println(Books{"Go 语言", "www.runooos.com", "Go 语言教程", 123})

    // 也可以使用 key => value 格式
    fmt.Println(Books{title: "Go 语言", author: "www.runoops.com", subject: "Go 语言教程", book_id: 123})

    // 忽略的字段为 0 或 空
    fmt.Println(Books{title: "Go 语言", author: "www.runoops.com"})
}