<?php

/**
 * Class Article
 */
class Article
{
    /**
     * @var string Имя статьи
     */
    private $name;
    /**
     * @var string Текст статьи
     */
    private $text;
    /**
     * @var Author Автор статьи
     */
    private $author;

    /**
     * Конструктор объекта Статья
     *
     * @param $name string
     * @param $text string
     * @param $author Author
     */
    public function __construct($name, $text, $author)
    {
        $this->name = $name;
        $this->text = $text;
        $this->author = $author;
    }

    /**
     * Задать имя статьи
     * @param $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Получить имя статьи
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Задать текст статьи
     * @param $text string
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * Получить текст статьи
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Задать автора статьи
     * @param $author Author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * Изменить автора статьи
     * @param $author Author
     */
    public function changeAuthor($author)
    {
        $this->setAuthor($author);
    }

    /**
     * Получить автора статьи
     * @return Author
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Получить имя автора статьи
     * @return string
     */
    public function getAuthorName()
    {
        return $this->author->getName();
    }

}

/**
 * Class Author
 */
class Author
{
    /**
     * @var string Имя автора
     */
    private $name;

    /**
     * Конструктор объекта Автор
     * @param $name string
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * Задание имени автора
     * @param $name string
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Получение имени автора
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Создание новой статьи для автора
     * @param $name string
     * @param $text string
     * @return Article
     */
    public function newArticle($name, $text)
    {
        return new Article($name, $text, $this);
    }

    /**
     * Получение списка статей автора
     * @return array
     */
    public function getArticles()
    {
        return array();
    }
}