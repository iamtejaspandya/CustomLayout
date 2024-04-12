<?php
namespace Tejas\CustomLayout\Block;

use Magento\Framework\View\Element\Template;
use Magento\Catalog\Api\CategoryRepositoryInterface;
use Magento\Framework\Registry;

class CustomBlock extends Template
{
    protected $categoryRepository;
    protected $registry;

    public function __construct(
        Template\Context $context,
        CategoryRepositoryInterface $categoryRepository,
        Registry $registry,
        array $data = []
    ) {
        $this->categoryRepository = $categoryRepository;
        $this->registry = $registry;
        parent::__construct($context, $data);
    }

    public function getCategoryName()
    {
        $categoryId = $this->registry->registry('current_category')->getId();

        $category = $this->categoryRepository->get($categoryId);

        $categoryName = $category->getName();

        return $categoryName;
    }
}
