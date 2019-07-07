<?php

echo "<table border='1px' align='center' style='text-align: center; padding: 5px'>";
echo "<tr>";
echo "<td>Имя</td>";
echo "<td>Фамилия</td>";
echo "<td>Количество действий с оценкой не ниже 7</td>";
echo "<td>Количество действий с оценкой ниже 7</td>";
echo "</tr>";

foreach ($users as $key => $user){
    echo "<tr>";
    echo "<td>{$user['name']}</td>";
    echo "<td>{$user['surname']}</td>";
    echo "<td>{$actionsOverRate7[$key]['count']}</td>";
    echo "<td>{$actionsUnderRate7[$key]['count']}</td>";
    echo "</tr>";
}
echo "</table>";