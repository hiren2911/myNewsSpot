<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NewsControllerTest extends TestCase
{
    /**
     * A basic test case for index method
     *
     * @return void
     */
    public function testIndex()
    {
        $response = $this->get('/news');
        $response->assertStatus(200);
        $response->assertSeeText('The New Stuff');
        $response->assertViewHas('news_list');
        $news_list = $response->original->getData()['news_list'];
 
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $news_list);

    }

    /**
     * A basic test case for show method
     *
     * @return void
     */
    public function testShow()
    {
        $response = $this->get('/news/1');
        $response->assertStatus(200);
        $response->assertSeeText('New Detail');
        $response->assertViewHas('news');

    }

    /**
     * A basic test case for Create method
     *
     * @return void
     */
    public function testCreate()
    {
        $response = $this->get(route('news.create'));
        // for gust user create method should redict user to login page
        $response->assertRedirect(route('login'));
    }

    /**
     * A basic test case for Create method
     *
     * @return void
     */
    public function testMylist()
    {
        $response = $this->get(route('myposts'));
        // for gust user mypost method should redict user to login page
        $response->assertRedirect(route('login'));
    }


}
