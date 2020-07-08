--  Create table for tea products
--  run this first
CREATE TABLE products(
    name varchar(255),
    price float(10,2),
    image text,
    rating float(1,1),
    category varchar(255),
    description text
);

-- run this second
INSERT INTO products(name, price, image, rating, category, description) VALUES
('Jasmine Green Tea', 5.00, '../../Images/jasmine green tea.jpeg', 0.0, 'tea', 'Jasmine tea is tea scented with the aroma of jasmine blossoms. Typically, jasmine tea has green tea as the tea base; however, white tea and black tea are also used. The resulting flavour of jasmine tea is subtly sweet and highly fragrant. It is the most famous scented tea in China'),
('Oolong Black Tea', 4.00, '../../Images/oolong black tea.jpeg', 0.0, 'tea', 'Oolong teas are semi–oxidized, which places them mid–way between green and black teas. This gives them the body and complexity of a black tea, with the brightness and freshness of a green tea.'),
('Earl Grey Tea', 8.00, '../../Images/earl grey tea.jpeg', 0.0, 'tea', 'Earl Grey is one of the most recognized flavored teas in the world. This quintessentially British tea is typically a black tea base flavored with oil from the rind of bergamot orange, a citrus fruit with the appearance and flavor somewhere between an orange and a lemon with a little grapefruit and lime thrown in.'),
('Chamomile Tea', 6.00, '../../Images/chamomile tea.png', 0.0, 'tea', 'It has been consumed for centuries as a natural remedy for several health conditions. To make chamomile tea, the flowers are dried and then infused into hot water. Many people enjoy chamomile tea as a caffeine-free alternative to black or green tea and for its earthy, somewhat sweet taste.'),
('English Breakfast Tea', 5.00, '../../Images/english breakfast tea.png', 0.0, 'tea', 'English breakfast tea is a black tea blend usually described as full-bodied, robust, rich and blended to go well with milk and sugar, in a style traditionally associated with a hearty English breakfast.'),
('Arabica Blend', 9.00, '../../Images/arabica coffee.jpg', 0.0, 'coffee', 'Arabica beans tend to have a sweeter, softer taste, with tones of sugar, fruit, and berries. Their acidity is higher, with that winey taste that characterizes coffee with excellent acidity.'),
('Robusta Blend', 5.00, '../../Images/robusta coffee.jpg', 0.0, 'coffee', 'Robusta coffee tastes earthy and is often said to have a bitter, rubbery/grain-like flavor, with a peanutty aftertaste. Robusta coffee beans contain more caffeine and less sugar than arabica beans, and therefore taste stronger and harsher than arabica.');