<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\MinkContext;

/**
 * Defines application features from the specific context.
 */
class SamContext extends MinkContext implements SnippetAcceptingContext
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /**
     * @Given I am logged in
     */
    public function iAmLoggedIn()
    {
        $this->visit("/");
        $this->getSession()->getPage()->clickLink("My Account");
        $this->fillField("log", "slevene");
        $this->fillField("pwd", "Alphabet12");
        $this->pressButton("submit");
    }

    /**
     * @Then I can see that I am logged in
     */
    public function iCanSeeThatIAmLoggedIn()
    {
        $this->getSession()->getPage()->find('xpath', "/html/body/div[3]/div/ul[2]/li[2]");
    }

}
