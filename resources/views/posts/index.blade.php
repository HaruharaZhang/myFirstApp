@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Post List</h1>

  <div class="card-list">
    @foreach($posts as $post)
    <a href="{{ route('posts.show', $post->id) }}" class="card-link">
      <div class="card">
        <div class="card-body d-flex">
          <div class="avatar-container">
            <img src="{{ asset($post->user->avatar) }}" alt="User Avatar" width="50" height="50" class="mr-3 rounded-circle">
          </div>
          <div>
            <h5 class="card-title">{{ $post->title }}</h5>
            <p class="card-text">{{ $post->desc }}</p>
            <p class="card-time" style="color: gray; font-size: 12px;">Publish at: {{ $post->created_at->format('Y-m-d h:m') }}</p>
          </div>
        </div>
      </div>
    </a>
    @endforeach
  </div>

  <div class="mt-4">
    {{ $posts->links() }}
  </div>
</div>
@endsection

@section('styles')
<style>

  .card-list {
    display: flex;
    /* 设置弹性布局 */
    flex-wrap: wrap;
    /* 设置多余的 card 换行 */
    justify-content: center;
    /* 设置 card 在容器中居中 */
  }

  .card-link {
    text-decoration: none;
    /* 取消卡片链接的下划线 */
  }

  .card {
    background-color: #fff;
    /* 设置背景颜色为白色 */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    /* 添加卡片阴影 */
    border: 1px solid #ccc;
    /* 设置卡片边框 */
    border-radius: 10px;
    /* 设置圆角大小 */
    margin: 20px;
    /* 设置卡片之间的外边距 */
    flex: 1 1 100%;
    /* 设置弹性布局的基础属性 */
    max-width: 100%;
    /* 设置最大宽度为 100% */
    overflow: hidden;
    /* 隐藏溢出部分 */
    position: relative;
    /* 设置相对定位，为卡片悬停效果作准备 */
  }


  .card-body {
    padding: 15px;
    /* 添加卡片内边距 */
  }


  .card-title {
    font-size: 20px;
    /* 设置卡片标题字体大小 */
    margin-bottom: 10px;
    /* 设置卡片标题下方边距 */
  }


  .card-text {
    font-size: 16px;
    /* 设置卡片正文字体大小 */
    margin-bottom: 15px;
    /* 设置卡片正文下方边距 */
  }

  .card-time {
    color: gray;
    font-size: 12px;
    /* 设置卡片正文字体大小 */
    margin-bottom: 10px;
    /* 设置卡片正文下方边距 */
  }


  /* 添加 hover 伪类 */
  .card:hover {
    box-shadow: 0px 0px 20px 10px rgba(0, 0, 0, 0.2);
    /* 添加悬停时的卡片阴影效果 */
    transform: translateY(-2px);
    /* 添加悬停时的卡片移动效果 */
  }


  @media (min-width: 768px) {
    .card {
      margin: 15px;
      /* 设置较小屏幕卡片的外边距 */
      /* 768px 屏幕以上的外边距 */
      flex-basis: calc(50% - 20px);
    }
  }

  @media (min-width: 992px) {
    .card {
      margin: 20px;
      /* 992px 屏幕以上的外边距 */
      flex-basis: calc(33.33% - 20px);
    }
  }
</style>
@endsection