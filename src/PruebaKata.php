<?php

namespace Deg540\PruebaKataPHP;


class PruebaKata
{
    public function add(string $numbers): int
    {
        if (empty($numbers)) {
            return 0;
        }
        $numbersHigherThan1000 = 0;
        $negativeNumbers = [];
        $numbers = str_replace('\n', ',', $numbers);

        if (str_contains($numbers, '//')) {
            $numbers = $this->extraeSeparador($numbers);

            list($negativeNumbers, $numbersHigherThan1000) = $this->analizaValoresMayoresDe1000yNegativos($numbers, $negativeNumbers, $numbersHigherThan1000);
            if (!empty($negativeNumbers)) {
                throw new \Exception('Negativos no soportados: ' . implode(', ', $negativeNumbers));
            }

            return array_sum(explode(',', $numbers)) - $numbersHigherThan1000;
        }

        list($negativeNumbers, $numbersHigherThan1000) = $this->analizaValoresMayoresDe1000yNegativos($numbers, $negativeNumbers, $numbersHigherThan1000);
        if (!empty($negativeNumbers)) {
            throw new \Exception('Negativos no soportados: ' . implode(', ', $negativeNumbers));
        }

        if (str_contains($numbers, ',')) {
            return array_sum(explode(',', $numbers)) - $numbersHigherThan1000;
        }

        return $numbers;
    }

    /**
     * @param array|string $numbers
     * @return array|string|string[]
     */
    public function extraeSeparador(array|string $numbers): string|array
    {
        $delimiter = substr($numbers, 2, 1);
        $numbers = str_replace(['//' . $delimiter . ',', $delimiter], ['', ','], $numbers);
        return $numbers;
    }

    /**
     * @param string $number
     * @param array $negativeNumbers
     * @return array
     */
    public function annadeNumeroNegativoAlListado(string $number, array $negativeNumbers): array
    {
        $negativeNumbers[] = $number;
        return $negativeNumbers;
    }

    /**
     * @param string $number
     * @param string $numbersHigherThan1000
     * @return string
     */
    public function sumarValoresSuperioresA1000(string $number, string $numbersHigherThan1000): string
    {
        $numbersHigherThan1000 .= $number;
        return $numbersHigherThan1000;
    }

    /**
     * @param array|string $numbers
     * @param mixed $negativeNumbers
     * @param mixed $numbersHigherThan1000
     * @return array
     */
    public function analizaValoresMayoresDe1000yNegativos(array|string $numbers, mixed $negativeNumbers, mixed $numbersHigherThan1000): array
    {
        foreach (explode(',', $numbers) as $number) {
            if ($number < 0) {
                $negativeNumbers = $this->annadeNumeroNegativoAlListado($number, $negativeNumbers);
            } else if ($number > 1000) {
                $numbersHigherThan1000 = $this->sumarValoresSuperioresA1000($number, $numbersHigherThan1000);
            }
        }
        return array($negativeNumbers, $numbersHigherThan1000);
    }
}