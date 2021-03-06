<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Recipe.
 *
 * @ORM\Table(name="recipe")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RecipeRepository")
 */
class Recipe
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var RecipeType int
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\RecipeType")
     */
    private $recipeType;

    /**
     * @var Season int
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Season")
     */
    private $season;

    /**
     * @var string
     *
     * @ORM\Column(name="preptime", type="string", length=255)
     */
    private $preptime;

    /**
     * @var string
     *
     * @ORM\Column(name="cooktime", type="string", length=255)
     */
    private $cooktime;

    /**
     * @var Season int
     *
     * @ORM\Column(name="age", type="integer")
     */
    private $age;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Food", cascade={"persist"}, inversedBy="recipes")
     */
    private $ingredients;

    /**
     * @var text
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Menu", cascade={"persist"}, inversedBy="recipes")
     */
    private $menus;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\PhotoRecipe", cascade={"remove"}, mappedBy="recipe")
     * @ORM\JoinColumn(nullable=false)
     */
    private $photoRecipes;

    /**
     * @var string
     *
     * @ORM\Column(name="filling", type="string", length=255)
     */
    private $filling;

    /**
     * @var text
     *
     * @ORM\Column(name="observation", type="text")
     */
    private $observation;

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->getName();
    }

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->menus = new ArrayCollection();
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return Recipe
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set recipeType.
     *
     * @param \AppBundle\Entity\RecipeType $recipeType
     *
     * @return Recipe
     */
    public function setRecipeType(\AppBundle\Entity\RecipeType $recipeType = null)
    {
        $this->recipeType = $recipeType;

        return $this;
    }

    /**
     * Get recipeType.
     *
     * @return \AppBundle\Entity\RecipeType
     */
    public function getRecipeType()
    {
        return $this->recipeType;
    }

    /**
     * Set season.
     *
     * @param \AppBundle\Entity\Season $season
     *
     * @return Recipe
     */
    public function setSeason(\AppBundle\Entity\Season $season = null)
    {
        $this->season = $season;

        return $this;
    }

    /**
     * Get season.
     *
     * @return \AppBundle\Entity\Season
     */
    public function getSeason()
    {
        return $this->season;
    }

    /**
     * Set cantent.
     *
     * @param string $content
     *
     * @return Recipe
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get cantent.
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Add menu.
     *
     * @param \AppBundle\Entity\Menu $menu
     *
     * @return Recipe
     */
    public function addMenu(\AppBundle\Entity\Menu $menu)
    {
        $this->menus[] = $menu;

        return $this;
    }

    /**
     * Remove menu.
     *
     * @param \AppBundle\Entity\Menu $menu
     */
    public function removeMenu(\AppBundle\Entity\Menu $menu)
    {
        $this->menus->removeElement($menu);
    }

    /**
     * Get menus.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMenus()
    {
        return $this->menus;
    }

    /**
     * Add photoRecipe.
     *
     * @param \AppBundle\Entity\PhotoRecipe $photoRecipe
     *
     * @return Recipe
     */
    public function addPhotoRecipe(\AppBundle\Entity\PhotoRecipe $photoRecipe)
    {
        $this->photoRecipes[] = $photoRecipe;

        return $this;
    }

    /**
     * Remove photoRecipe.
     *
     * @param \AppBundle\Entity\PhotoRecipe $photoRecipe
     */
    public function removePhotoRecipe(\AppBundle\Entity\PhotoRecipe $photoRecipe)
    {
        $this->photoRecipes->removeElement($photoRecipe);
    }

    /**
     * Get photoRecipes.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPhotoRecipes()
    {
        return $this->photoRecipes;
    }

    /**
     * Set preptime.
     *
     * @param string $preptime
     *
     * @return Recipe
     */
    public function setPreptime($preptime)
    {
        $this->preptime = $preptime;

        return $this;
    }

    /**
     * Get preptime.
     *
     * @return string
     */
    public function getPreptime()
    {
        return $this->preptime;
    }

    /**
     * Set cooktime.
     *
     * @param string $cooktime
     *
     * @return Recipe
     */
    public function setCooktime($cooktime)
    {
        $this->cooktime = $cooktime;

        return $this;
    }

    /**
     * Get cooktime.
     *
     * @return string
     */
    public function getCooktime()
    {
        return $this->cooktime;
    }

    /**
     * Set age.
     *
     * @param string $age
     *
     * @return Recipe
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age.
     *
     * @return string
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set filling.
     *
     * @param string $filling
     *
     * @return Recipe
     */
    public function setFilling($filling)
    {
        $this->filling = $filling;

        return $this;
    }

    /**
     * Get filling.
     *
     * @return string
     */
    public function getFilling()
    {
        return $this->filling;
    }

    /**
     * Set observation.
     *
     * @param string $observation
     *
     * @return Recipe
     */
    public function setObservation($observation)
    {
        $this->observation = $observation;

        return $this;
    }

    /**
     * Get observation.
     *
     * @return string
     */
    public function getObservation()
    {
        return $this->observation;
    }

    /**
     * Get ingredients.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIngredients()
    {
        return $this->ingredients;
    }

    /**
     * Add ingredient.
     *
     * @param \AppBundle\Entity\Food $ingredient
     *
     * @return Recipe
     */
    public function addIngredient(\AppBundle\Entity\Food $ingredient)
    {
        $this->ingredients[] = $ingredient;

        return $this;
    }

    /**
     * Remove ingredient.
     *
     * @param \AppBundle\Entity\Food $ingredient
     */
    public function removeIngredient(\AppBundle\Entity\Food $ingredient)
    {
        $this->ingredients->removeElement($ingredient);
    }
}
