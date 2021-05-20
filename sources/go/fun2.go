//返回多个值
package main

import "fmt"

func swap(x, y string) (string, string) {
   return y, x
}

func main() {
   a, b := swap("Google", "Runoops")
   fmt.Println(a, b)
}