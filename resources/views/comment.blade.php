@extends('layouts.master')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
          <p class="text-center mb-4 text-3xl font-bold text-gray-500">Comment of {{ $post->user->username }}</p>
            <div>
                <div class=" bg-white flex flex-col justify-center items-center my-5">
                  <div class="w-full max-w-5xl border border-gray-300 rounded-2xl py-3 px-5">
                      <div class="flex">
                        <div class="mr-2">
                          <img
                            class="rounded-full h-12 w-12"
                            src={{ url($post->user->profile->avatar) }} 
                            alt="Aan"
                          />
                        </div>
                        <div>
                          <a href="{{ route('user.profile', $post->user->id) }}">
                            <div class="flex space-x-1">
                              <span class="font-bold">{{ $post->user->profile->name }}</span>
                              <span class="text-blue-500">
                                <svg
                                  class="w-6 h-6"
                                  fill="currentColor"
                                  viewBox="0 0 24 24"
                                  aria-label="Verified account"
                                >
                                  <g>
                                    <path d="M22.5 12.5c0-1.58-.875-2.95-2.148-3.6.154-.435.238-.905.238-1.4 0-2.21-1.71-3.998-3.818-3.998-.47 0-.92.084-1.336.25C14.818 2.415 13.51 1.5 12 1.5s-2.816.917-3.437 2.25c-.415-.165-.866-.25-1.336-.25-2.11 0-3.818 1.79-3.818 4 0 .494.083.964.237 1.4-1.272.65-2.147 2.018-2.147 3.6 0 1.495.782 2.798 1.942 3.486-.02.17-.032.34-.032.514 0 2.21 1.708 4 3.818 4 .47 0 .92-.086 1.335-.25.62 1.334 1.926 2.25 3.437 2.25 1.512 0 2.818-.916 3.437-2.25.415.163.865.248 1.336.248 2.11 0 3.818-1.79 3.818-4 0-.174-.012-.344-.033-.513 1.158-.687 1.943-1.99 1.943-3.484zm-6.616-3.334l-4.334 6.5c-.145.217-.382.334-.625.334-.143 0-.288-.04-.416-.126l-.115-.094-2.415-2.415c-.293-.293-.293-.768 0-1.06s.768-.294 1.06 0l1.77 1.767 3.825-5.74c.23-.345.696-.436 1.04-.207.346.23.44.696.21 1.04z" />
                                  </g>
                                </svg>
                              </span>
                            </div>
                            <div class="text-gray-500 leading-4">{{ $post->user->username }}</div>
                          </a>
                        </div>
                      </div>
                      <div class="py-3">
                        <p class="text-lg">
                          {{ $post->caption }}
                        </p>
                        @if ($post->photo->count())
                             <img src="{{  asset('images/' .$post->photo->first()->slug) }}" class="w-2/3 my-8" alt=""> 
                        @endif
                        <div class="flex">
                          <p class="text-gray-500 pt-1"> {{ $post->created_at->toTimeString() }} · {{ $post->created_at->toFormattedDateString() }}</p>
                          <svg
                            class="w-6 h-6 ml-auto text-gray-500"
                            fill="currentColor"
                            viewBox="0 0 24 24"
                          >
                            <g>
                              <path d="M12 18.042c-.553 0-1-.447-1-1v-5.5c0-.553.447-1 1-1s1 .447 1 1v5.5c0 .553-.447 1-1 1z"></path>
                              <circle cx={12} cy="8.042" r="1.25" />
                              <path d="M12 22.75C6.072 22.75 1.25 17.928 1.25 12S6.072 1.25 12 1.25 22.75 6.072 22.75 12 17.928 22.75 12 22.75zm0-20C6.9 2.75 2.75 6.9 2.75 12S6.9 21.25 12 21.25s9.25-4.15 9.25-9.25S17.1 2.75 12 2.75z"></path>
                            </g>
                          </svg>
                        </div>
                      </div>
                    <div class="flex space-x-5 pt-3 text-gray-500 border-t border-gray-300">
                    @if (!$post->likedBy(auth()->user()))
                    <form action="{{ route('likes', $post->id) }}" method="POST">
                        @csrf
                        <div class="flex space-x-2 hover:text-red-500">
                            <button type="submit">
                                <svg
                                viewBox="0 0 24 24"
                                fill="currentColor"
                                class="w-6 h-6"
                                
                                >
                                <g>
                                    <path d="M12 21.638h-.014C9.403 21.59 1.95 14.856 1.95 8.478c0-3.064 2.525-5.754 5.403-5.754 2.29 0 3.83 1.58 4.646 2.73.814-1.148 2.354-2.73 4.645-2.73 2.88 0 5.404 2.69 5.404 5.755 0 6.376-7.454 13.11-10.037 13.157H12zM7.354 4.225c-2.08 0-3.903 1.988-3.903 4.255 0 5.74 7.034 11.596 8.55 11.658 1.518-.062 8.55-5.917 8.55-11.658 0-2.267-1.823-4.255-3.903-4.255-2.528 0-3.94 2.936-3.952 2.965-.23.562-1.156.562-1.387 0-.014-.03-1.425-2.965-3.954-2.965z"></path>
                                  </g>
                              </svg>
                          </button>
                          <span>{{ $post->likes->count()}}</span>
                      </div>
                  </form>
                    @else
                    <form action="{{ route('likes.delete', $post->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="flex space-x-2 hover:text-red-500">
                            <button type="submit">
                                <svg
                                viewBox="0 0 24 24"
                                fill="currentColor"
                                class="w-6 h-6 fill-red "
                                
                                >
                                <g>
                                    <path d="M12 21.638h-.014C9.403 21.59 1.95 14.856 1.95 8.478c0-3.064 2.525-5.754 5.403-5.754 2.29 0 3.83 1.58 4.646 2.73.814-1.148 2.354-2.73 4.645-2.73 2.88 0 5.404 2.69 5.404 5.755 0 6.376-7.454 13.11-10.037 13.157H12zM7.354 4.225c-2.08 0-3.903 1.988-3.903 4.255 0 5.74 7.034 11.596 8.55 11.658 1.518-.062 8.55-5.917 8.55-11.658 0-2.267-1.823-4.255-3.903-4.255-2.528 0-3.94 2.936-3.952 2.965-.23.562-1.156.562-1.387 0-.014-.03-1.425-2.965-3.954-2.965z"></path>
                                  </g>
                              </svg>
                          </button>
                          <span>{{ $post->likes->count()}}</span>
                      </div>
                  </form>
                    @endif
                      
          
                      <div class="flex space-x-2">
                        <svg viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                          <g>
                            <path d="M14.046 2.242l-4.148-.01h-.002c-4.374 0-7.8 3.427-7.8 7.802 0 4.098 3.186 7.206 7.465 7.37v3.828c0 .108.044.286.12.403.142.225.384.347.632.347.138 0 .277-.038.402-.118.264-.168 6.473-4.14 8.088-5.506 1.902-1.61 3.04-3.97 3.043-6.312v-.017c-.006-4.367-3.43-7.787-7.8-7.788zm3.787 12.972c-1.134.96-4.862 3.405-6.772 4.643V16.67c0-.414-.335-.75-.75-.75h-.396c-3.66 0-6.318-2.476-6.318-5.886 0-3.534 2.768-6.302 6.3-6.302l4.147.01h.002c3.532 0 6.3 2.766 6.302 6.296-.003 1.91-.942 3.844-2.514 5.176z"></path>
                          </g>
                        </svg>
                        <span>{{ $post->comments->count() }}</span>
                      </div>
          
                      <div class="flex space-x-2">
                        @if ($post->user->id == auth()->user()->id)
                        <a href="{{ route('posts-edit', $post->id) }}">
                          <div class="flex space-x-2 hover:text-blue-500">
                              <button>
                                <span class="font-bold">Edit Post</span>
                            </button>
                          </div>
                        </a>
                        @endif
                      </div>
                        <div class="flex space-x-2">
                          @if ($post->user->id == auth()->user()->id)
                          <form action="{{ route('posts-destroy', $post->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="flex space-x-2 hover:text-red-500 ">
                                <button type="submit">
                                  <span class="font-bold">Delete Post</span>
                              </button>
                            </div>
                          </form>
                          @endif
                        </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="flex flex-col items-end">              
                @auth
                <div class="w-4/5">
                  <form action="{{ route('comments.post', $post->id) }}" method="post" class="mb-4 ">
                      @csrf
                      <div class="mb-4">
                          <label for="comment" class="sr-only">Comment</label>
                          <textarea name="comment" id="comment" cols="30" rows="4" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('comment') border-red-500 @enderror" placeholder="Comment something!"></textarea>
  
                          @error('comment')
                              <div class="text-red-500 mt-2 text-sm">
                                  {{ $message }}
                              </div>
                          @enderror
                      </div>
  
                      <div>
                          <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">Post</button>
                      </div>
                  </form>
                </div>
                  @endauth
              @if ($comments->count())
                  @foreach ( $comments as $comment )
                      <div class="w-4/5">
                          <div class=" bg-white flex flex-col justify-center my-5">
                            <div class=" border border-gray-300 rounded-2xl py-3 px-5">
                              <a href="{{ route('SubComments', $comment->id) }}">
                                <div class="flex">
                                  <div class="mr-2">
                                    <img
                                      class="rounded-full h-12 w-12"
                                      src={{ url($comment->user->profile->avatar) }}
                                      alt="avatar"
                                    />
                                  </div>
                                  <div>
                                    <div class="flex space-x-1">
                                      <span class="font-bold">{{ $comment->user->profile->name }}</span>
                                      <span class="text-blue-500">
                                        <svg
                                          class="w-6 h-6"
                                          fill="currentColor"
                                          viewBox="0 0 24 24"
                                          aria-label="Verified account"
                                        >
                                          <g>
                                            <path d="M22.5 12.5c0-1.58-.875-2.95-2.148-3.6.154-.435.238-.905.238-1.4 0-2.21-1.71-3.998-3.818-3.998-.47 0-.92.084-1.336.25C14.818 2.415 13.51 1.5 12 1.5s-2.816.917-3.437 2.25c-.415-.165-.866-.25-1.336-.25-2.11 0-3.818 1.79-3.818 4 0 .494.083.964.237 1.4-1.272.65-2.147 2.018-2.147 3.6 0 1.495.782 2.798 1.942 3.486-.02.17-.032.34-.032.514 0 2.21 1.708 4 3.818 4 .47 0 .92-.086 1.335-.25.62 1.334 1.926 2.25 3.437 2.25 1.512 0 2.818-.916 3.437-2.25.415.163.865.248 1.336.248 2.11 0 3.818-1.79 3.818-4 0-.174-.012-.344-.033-.513 1.158-.687 1.943-1.99 1.943-3.484zm-6.616-3.334l-4.334 6.5c-.145.217-.382.334-.625.334-.143 0-.288-.04-.416-.126l-.115-.094-2.415-2.415c-.293-.293-.293-.768 0-1.06s.768-.294 1.06 0l1.77 1.767 3.825-5.74c.23-.345.696-.436 1.04-.207.346.23.44.696.21 1.04z" />
                                          </g>
                                        </svg>
                                      </span>
                                    </div>
                                    <div class="text-gray-500 leading-4">{{ $comment->user->username }}</div>
                                  </div>
                                </div>
                                <div class="py-3">
                                  <p class="text-lg">
                                    {{ $comment->comment }}
                                  </p>
                                  <div class="flex">
                                    <p class="text-gray-500 pt-1"> {{ $comment->created_at->toTimeString() }} · {{ $comment->created_at->toFormattedDateString() }}</p>
                                    <svg
                                      class="w-6 h-6 ml-auto text-gray-500"
                                      fill="currentColor"
                                      viewBox="0 0 24 24"
                                    >
                                      <g>
                                        <path d="M12 18.042c-.553 0-1-.447-1-1v-5.5c0-.553.447-1 1-1s1 .447 1 1v5.5c0 .553-.447 1-1 1z"></path>
                                        <circle cx={12} cy="8.042" r="1.25" />
                                        <path d="M12 22.75C6.072 22.75 1.25 17.928 1.25 12S6.072 1.25 12 1.25 22.75 6.072 22.75 12 17.928 22.75 12 22.75zm0-20C6.9 2.75 2.75 6.9 2.75 12S6.9 21.25 12 21.25s9.25-4.15 9.25-9.25S17.1 2.75 12 2.75z"></path>
                                      </g>
                                    </svg>
                                  </div>
                                </div>
                              </a>
                              
                              <div class="flex space-x-5 pt-3 text-gray-500 border-t border-gray-300">
                                @if (!$comment->likedBy(auth()->user()))
                                <form action="{{ route('comments.likes', $comment->id) }}" method="POST">
                                    @csrf
                                    <div class="flex space-x-2 hover:text-red-500">
                                        <button type="submit">
                                            <svg
                                            viewBox="0 0 24 24"
                                            fill="currentColor"
                                            class="w-6 h-6"
                                            
                                            >
                                            <g>
                                                <path d="M12 21.638h-.014C9.403 21.59 1.95 14.856 1.95 8.478c0-3.064 2.525-5.754 5.403-5.754 2.29 0 3.83 1.58 4.646 2.73.814-1.148 2.354-2.73 4.645-2.73 2.88 0 5.404 2.69 5.404 5.755 0 6.376-7.454 13.11-10.037 13.157H12zM7.354 4.225c-2.08 0-3.903 1.988-3.903 4.255 0 5.74 7.034 11.596 8.55 11.658 1.518-.062 8.55-5.917 8.55-11.658 0-2.267-1.823-4.255-3.903-4.255-2.528 0-3.94 2.936-3.952 2.965-.23.562-1.156.562-1.387 0-.014-.03-1.425-2.965-3.954-2.965z"></path>
                                              </g>
                                          </svg>
                                      </button>
                                      <span>{{ $comment->likes->count()}}</span>
                                  </div>
                              </form>
                                @else
                                <form action="{{ route('comments.likes.delete', $comment->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="flex space-x-2 hover:text-red-500">
                                        <button type="submit">
                                            <svg
                                            viewBox="0 0 24 24"
                                            fill="currentColor"
                                            class="w-6 h-6 fill-red "
                                            
                                            >
                                            <g>
                                                <path d="M12 21.638h-.014C9.403 21.59 1.95 14.856 1.95 8.478c0-3.064 2.525-5.754 5.403-5.754 2.29 0 3.83 1.58 4.646 2.73.814-1.148 2.354-2.73 4.645-2.73 2.88 0 5.404 2.69 5.404 5.755 0 6.376-7.454 13.11-10.037 13.157H12zM7.354 4.225c-2.08 0-3.903 1.988-3.903 4.255 0 5.74 7.034 11.596 8.55 11.658 1.518-.062 8.55-5.917 8.55-11.658 0-2.267-1.823-4.255-3.903-4.255-2.528 0-3.94 2.936-3.952 2.965-.23.562-1.156.562-1.387 0-.014-.03-1.425-2.965-3.954-2.965z"></path>
                                              </g>
                                          </svg>
                                      </button>
                                      <span>{{ $comment->likes->count()}}</span>
                                  </div>
                              </form>
                              @endif
                                <a href="{{ route('SubComments', $comment->id) }}">
                                <div class="flex space-x-2">
                                  <svg viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                    <g>
                                      <path d="M14.046 2.242l-4.148-.01h-.002c-4.374 0-7.8 3.427-7.8 7.802 0 4.098 3.186 7.206 7.465 7.37v3.828c0 .108.044.286.12.403.142.225.384.347.632.347.138 0 .277-.038.402-.118.264-.168 6.473-4.14 8.088-5.506 1.902-1.61 3.04-3.97 3.043-6.312v-.017c-.006-4.367-3.43-7.787-7.8-7.788zm3.787 12.972c-1.134.96-4.862 3.405-6.772 4.643V16.67c0-.414-.335-.75-.75-.75h-.396c-3.66 0-6.318-2.476-6.318-5.886 0-3.534 2.768-6.302 6.3-6.302l4.147.01h.002c3.532 0 6.3 2.766 6.302 6.296-.003 1.91-.942 3.844-2.514 5.176z"></path>
                                    </g>
                                  </svg>
                                  <span>{{ $comment->subComments->count() }}</span>
                                </div>
                              </a>
                              </div>
                            </div>
                          </div>
                        </div>
                  @endforeach
              @else   
                  <h1>
                      No Comment Found
                  </h1>
              @endif
          </div>
        </div>
    </div>
@endsection