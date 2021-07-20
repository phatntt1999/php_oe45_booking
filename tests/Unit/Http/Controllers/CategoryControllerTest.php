<?php

namespace Tests\Unit\Http\Controllers;

use App\Http\Controllers\Admin\CategoryController;
use App\Models\CategoryTour;
use App\Repositories\RepositoryInterface;
use App\Repositories\TourCategory\CatTourRepository;
use App\Repositories\TourCategory\CatTourRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Tests\TestCase;
use Faker\Factory as Fake;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request as HttpRequest;
use Mockery as mock;

class CategoryControllerTest extends TestCase
{
    protected $categoryMock;
    protected $categoryTour;
    protected $categoryController;

    public function setUp(): void
    {
        parent::setUp();
        $this->categoryMock = mock::mock(CatTourRepositoryInterface::class);
        $this->categoryController = new CategoryController(
            $this->app->instance(CatTourRepositoryInterface::class, $this->categoryMock)
        );
        $this->categoryTour = CategoryTour::factory()->create(['cat_name' => 'Da Nang']);
    }

    public function tearDown(): void
    {
        mock::close();
        parent::tearDown();
    }

    public function testIndexFuntion()
    {
        $this->categoryMock
            ->shouldReceive('sortAndPaginate')
            ->once()
            ->andReturn(new Collection());
        $result = $this->categoryController->index();
        $data = $result->getData();
        $this->assertIsArray($data);
        $this->assertEquals('admin.listCategory', $result->getName());
        $this->assertArrayHasKey('cat_tours', $data);
    }

    public function testCreateFuntion()
    {
        $category = new CategoryController($this->categoryMock);
        $result = $category->create();
        $this->assertEquals('admin.createCategory', $result->getName());
    }

    public function testStoreFuntion()
    {
        $this->categoryMock
            ->shouldReceive('create')
            ->once()
            ->andReturn(true);

        $data = [
            'name' => Fake::create()->name,
        ];

        $request = new HttpRequest($data);
        $result = $this->categoryController->store($request);
        $this->assertInstanceOf(RedirectResponse::class, $result);
        $this->assertEquals(route('categories.create'), $result->headers->get('location'));
    }

    public function testEditFunction()
    {
        $this->categoryMock
            ->shouldReceive('find')
            ->once()
            ->andReturn(true);

        $dataId = 1;
        $result = $this->categoryController->edit($dataId);

        $dataResult = $result->getData();

        $this->assertIsArray($dataResult);
        $this->assertEquals('admin.editCategory', $result->getName());
        $this->assertArrayHasKey('cat_tour', $dataResult);
    }

    public function testUpdateunction()
    {
        $this->categoryMock
            ->shouldReceive('update')
            ->once()
            ->andReturn(true);

        $dataId = 1;
        $data = [
            'cat_name' => Fake::create()->name,
        ];

        $request = new HttpRequest($data);

        $result = $this->categoryController->update($request, $dataId);

        $this->assertInstanceOf(RedirectResponse::class, $result);
        $this->assertEquals(route('categories.index'), $result->headers->get('Location'));
    }
}
