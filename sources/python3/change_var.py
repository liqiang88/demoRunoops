# -*- coding: UTF-8 -*-

# Filename : change_var.py
# author by : www.runoops.com
# Python 交换变量

# 用户输入
 
x = input('输入 x 值: ')
y = input('输入 y 值: ')
 
# 创建临时变量，并交换
temp = x
x = y
y = temp


# 或者不使用临时变量的方式
# x,y = y,x

 
print('交换后 x 的值为: {}'.format(x))
print('交换后 y 的值为: {}'.format(y))