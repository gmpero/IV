<?php

$data = [
    //['Петров', 'Азбука', 45], // Строка для теста
    //['Петров', 'Физика', 5], // Строка для теста
    ['Петров', 'Математика', 5],
    ['Иванов', 'Математика', 5],
    ['Иванов', 'Математика', 4],
    ['Иванов', 'Математика', 5],
    ['Сидоров', 'Физика', 4],
    ['Иванов', 'Физика', 4],
    ['Петров', 'ОБЖ', 4],
];


/**
 * Функция для обработки данных об оценках студентов и формирования результирующих массивов.
 *
 * @param array $data Массив данных об оценках студентов. Каждый элемент массива содержит информацию в формате [имя студента, название предмета, оценка].
 * @return array Массив, содержащий два обработанных массива: первый массив с данными об оценках студентов и второй массив со списком всех предметов.
 */
function getResultArrays(array $data): array
{
    $allLessons = array_unique(array_column($data, 1));
    sort($allLessons);

    $resultData = [];
    foreach ($data as $item) {
        $studentName = $item[0];
        $studentLesson = $item[1];
        $studentGrade = $item[2];

        if (!array_key_exists($studentName, $resultData)) {
            $resultData[$studentName] = [];
            foreach ($allLessons as $lesson)
                $resultData[$studentName][$lesson] = null;
        }

        $resultData[$studentName][$studentLesson] += $studentGrade;
    }

    ksort($resultData);
    array_unshift($allLessons, null);

    return [$resultData, $allLessons];
}


$result = getResultArrays($data);
$data = $result[0];
$allLessons = $result[1];



