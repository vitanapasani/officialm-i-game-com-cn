<?php

namespace App\Helpers;

class LinkCard
{
    private string $title;
    private string $url;
    private string $description;
    private string $imageUrl;

    public function __construct(string $title, string $url, string $description = '', string $imageUrl = '')
    {
        $this->title = $title;
        $this->url = $url;
        $this->description = $description;
        $this->imageUrl = $imageUrl;
    }

    public function getTitle(): string
    {
        return htmlspecialchars($this->title, ENT_QUOTES, 'UTF-8');
    }

    public function getUrl(): string
    {
        return htmlspecialchars($this->url, ENT_QUOTES, 'UTF-8');
    }

    public function getDescription(): string
    {
        return htmlspecialchars($this->description, ENT_QUOTES, 'UTF-8');
    }

    public function getImageUrl(): string
    {
        return htmlspecialchars($this->imageUrl, ENT_QUOTES, 'UTF-8');
    }

    public function render(): string
    {
        $safeTitle = $this->getTitle();
        $safeUrl = $this->getUrl();
        $safeDescription = $this->getDescription();
        $safeImageUrl = $this->getImageUrl();

        $html = '<div class="link-card">';
        $html .= '<a href="' . $safeUrl . '" target="_blank" rel="noopener noreferrer">';

        if ($safeImageUrl !== '') {
            $html .= '<div class="link-card-image">';
            $html .= '<img src="' . $safeImageUrl . '" alt="' . $safeTitle . '" />';
            $html .= '</div>';
        }

        $html .= '<div class="link-card-content">';
        $html .= '<h3 class="link-card-title">' . $safeTitle . '</h3>';

        if ($safeDescription !== '') {
            $html .= '<p class="link-card-description">' . $safeDescription . '</p>';
        }

        $html .= '<span class="link-card-url">' . $safeUrl . '</span>';
        $html .= '</div>';
        $html .= '</a>';
        $html .= '</div>';

        return $html;
    }

    public static function renderCard(string $title, string $url, string $description = '', string $imageUrl = ''): string
    {
        $card = new self($title, $url, $description, $imageUrl);
        return $card->render();
    }
}

// 示例用法（实际项目中可移除）
/*
$card = new LinkCard(
    '爱游戏',
    'https://officialm-i-game.com.cn',
    '探索精彩的游戏世界，尽在爱游戏平台',
    'https://officialm-i-game.com.cn/logo.png'
);
echo $card->render();
*/