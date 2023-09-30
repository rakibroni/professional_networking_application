<!-- Answer card  ====> use ( expert-bg ) for expert background with ( anser-header ) -->
<?php
$isExpertForQuestion = $question_comment->user->isExpertForQuestion($questionCategories);

?>
<div class="answer-card mb-2 comment-box-{{ $question_comment->question_id }}">
  <div>
    <!-- Border -->
    <div class="answer-header @if ($isExpertForQuestion) expert-bg @endif py-1">
      <span role="figure" class="rounded-pill answer-avatar px-2">
        <div><?php Helper::profilePicture('', '32px', $question_comment->user, 'pointer-on-hover', 'margin-top: 3px'); ?></div>

        <div class="ms-2 d-flex justify-content-between w-100">
          <div style="width: calc(100% - 100px)">
            <div class="d-flex justify-content-between">
              <div class="d-inline-block HideOverflowText"
                onclick="loadUserProfileCard('{{ $question_comment->user->username }}')"
                style="font-weight: 600; font-size: 13px">
                <span
                  class="underline-on-hover">{{ $question_comment->user->firstname . ' ' . $question_comment->user->name }}</span>
              </div>

            </div>

            <div class="mb-1 pointer-on-hover HideOverflowText"
              onclick="loadUserProfileCard('{{ $question_comment->user->username }}')"
              style="font-size: 12px !important; color: #7F7F7F"><span
                class="pointer-on-hover">{{ $question_comment->user->current_position }}{{ $question_comment->user->currentEmployer(['']) }}</span>
            </div>
          </div>





          <div class="PostTimeFont d-flex justify-content-end" style="width:100px !important">
            <div>
              <div class="d-inline-block" style="font-size: 12px; font-weight: 400; color: #7F7F7F !important">
                {{ $question_comment->created_at->locale('de_DE')->shortRelativeDiffForHumans() }}
              </div>
              <div class="d-flex justify-content-end">
                <button class="btn-clear p-0" data-bs-toggle="dropdown" aria-expanded="false">
                  <svg xmlns="http://www.w3.org/2000/svg" max-width="50px" height="23" fill="currentColor"
                    class="bi bi-three-dots" viewBox="0 0 16 16" style="color: rgba(168, 168, 168, 1)">
                    <path
                      d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
                  </svg>
                </button>
                <ul class="dropdown-menu">
                  <li>
                    <div
                      onclick="openReportModal('{{ $question_comment->user->fullName() }}', '{{ $question_comment->user->username }}', 'comment', '{{ $question_comment->uuid }}', '{{ $question_comment->post_id }}')"
                      class="dropdown-item pointer-on-hover text-center">
                      Kommentar melden</div>
                  </li>
                </ul>
              </div>
            </div>

            {{-- shortRelativeDiffForHumans() --}}

          </div>


        </div>
      </span>
    </div>
    <div class="answer-body p-2">
      <p class="my-1" role="article" aria-label="Content of Answer">
        {{ $question_comment->comment }}
      </p>
      {{-- <a role="button" class="load-more">Mehr anzeigen</a> --}}
    </div>
  </div>

  <div class="answer-actions row ps-1 d-flex">

    <div class="d-flex justify-content-start">
      <div>
        <a role="button" class="icon col-auto">
          @if ($user_like_check == 0)
            <img width="25" height="25" onclick="addCommentLike({{ $question_comment->id }})"
              id="comment_like_{{ $question_comment->id }}" src="{{ asset('images/helpful-icon.svg') }}"
              class="pointer-on-hover pb-1" alt="" />
          @else
            <img width="25" height="25" onclick="removeCommentLike({{ $question_comment->id }})"
              id="comment_like_{{ $question_comment->id }}" src="{{ asset('images/active-helpful-icon.svg') }}"
              class="pointer-on-hover  pb-1" alt="" />
          @endif
          {{-- <span role="svg">
                      <svg fill="none" viewBox="0 0 29 28" width="25" height="25" xmlns="http://www.w3.org/2000/svg">
                          <g fill="#7F7F7F" stroke="#7F7F7F" stroke-width=".5">
                              <path
                                  d="m4.7353 13.736c-0.27002-0.174-0.62527-0.0972-0.7993 0.1728s-0.09723 0.6253 0.17279 0.7993 0.62527 0.0972 0.7993-0.1728c0.18043-0.2404 0.09723-0.6253-0.17279-0.7993z" />
                              <path
                                  d="m25.788 14.871c0.0724-0.31 0.02-0.6241-0.1624-0.8945l-3.4038-5.3532c-0.1644-0.25883-0.4228-0.45086-0.7328-0.52329-0.3101-0.07242-0.6241-0.02002-0.8945 0.16239l-1.3354 0.84644c-0.2588 0.16441-0.4509 0.42283-0.5233 0.73286-0.0272 0.16085-0.0364 0.33325 2e-3 0.51085-0.7645 0.1188-1.5674 0.06-2.3019-0.1841l-1.0393-0.36409c-0.6688-0.22725-1.3909-0.05566-1.883 0.39159l-0.8813-0.1349c-0.5597-0.0804-1.1581 0.018-1.6706 0.2992l-0.3476 0.1836c-0.2653 0.1348-0.5561 0.1512-0.84295 0.0428l-0.58005-0.2465c0.03881-0.1788 0.05962-0.36921 0.02122-0.54683-0.06399-0.29604-0.2464-0.56648-0.51643-0.74051l-1.3321-0.85855c-0.54005-0.34806-1.2801-0.18807-1.6282 0.35198l-3.4458 5.3465c-0.17403 0.27-0.22845 0.5916-0.16445 0.8876 0.064 0.2961 0.24641 0.5665 0.51643 0.7406l1.3321 0.8585c0.19801 0.1276 0.41283 0.1896 0.64446 0.1861 0.38604-6e-3 0.7633-0.196 0.98373-0.5381l0.02321-0.036 0.76246 0.5169c-0.40846 0.4757-0.37969 1.1821 0.06115 1.6446 0.21721 0.2164 0.51044 0.3545 0.81928 0.3497 0.01638 0.2908 0.12799 0.592 0.3452 0.8085 0.23522 0.228 0.52205 0.3364 0.81928 0.3497 0.01639 0.2908 0.12799 0.592 0.34521 0.8085 0.23521 0.228 0.52204 0.3364 0.81928 0.3496 0.00478 0.3089 0.12799 0.5921 0.3452 0.8085 0.23527 0.2281 0.55807 0.3597 0.86687 0.3549 0.3089-0.0048 0.6281-0.1048 0.8677-0.358l0.3801-0.392 0.5512 0.6865c0.018 0.0116 0.018 0.0116 0.0244 0.0412 0.2776 0.2808 0.6545 0.4473 1.0585 0.4529 0.4041 0.0056 0.7697-0.1664 1.0506-0.444 0.2396-0.2533 0.3892-0.5645 0.4372-0.9157 0.4529 0.088 0.9678-0.0388 1.313-0.3768l0.0232-0.036c0.2577-0.2416 0.4009-0.5825 0.4373-0.9157 0.4709 0.0996 0.9973-0.0452 1.3542-0.4012 0.2576-0.2416 0.4008-0.5824 0.4309-0.9453 0.1132 0.022 0.2264 0.044 0.3448 0.0184 0.4156-0.0123 0.7813-0.1844 1.0621-0.462 0.1869-0.2108 0.3133-0.486 0.3625-0.76l1.8131-1.0737c0.2364 0.3052 0.5836 0.4781 0.94 0.4785 0.2201 0.0144 0.4389-0.0484 0.6269-0.182l1.3354-0.8464c0.3012-0.1116 0.4933-0.3701 0.5657-0.6801zm-21.385 0.8424-1.3321-0.8585c-0.09-0.058-0.13881-0.1404-0.17601-0.2408-0.01919-0.0889 0.00281-0.2021 0.06082-0.2921l3.4458-5.3464c0.11602-0.18001 0.35284-0.23121 0.53286-0.11519l1.3321 0.85855c0.09001 0.05801 0.13881 0.14042 0.17601 0.24083 0.0192 0.08885-0.00281 0.20205-0.06082 0.29205l-3.4458 5.3465c-0.09802 0.1916-0.33485 0.2428-0.53287 0.1151zm4.2196 0.8851-0.99455 0.9897c-0.15202 0.1568-0.46086 0.1616-0.60607-0.0084-0.17481-0.1637-0.1732-0.4429 0.00843-0.6061l0.99455-0.9897c0.07601-0.0784 0.18803-0.1336 0.31284-0.1296 0.10681-0.0076 0.22643 0.044 0.30483 0.12 0.16321 0.1817 0.1616 0.4609-0.02003 0.6241zm1.3873 0.9706-1.211 1.2069c-0.16363 0.1748-0.44286 0.1732-0.60607-0.0085-0.17481-0.1636-0.1732-0.4428 0.00842-0.606l0.99456-0.9897 0.20483-0.1992c0.07601-0.0784 0.18802-0.1336 0.31284-0.1296 0.12481 4e-3 0.22642 0.044 0.3048 0.12 0.0784 0.076 0.1336 0.188 0.1296 0.3129-0.0104 0.0952-0.062 0.2148-0.138 0.2932zm0.9481 1.3754-0.9946 0.9896c-0.16362 0.1749-0.44285 0.1732-0.60606-0.0084-0.17482-0.1636-0.17321-0.4428 0.00842-0.606l0.99454-0.9897c0.076-0.0784 0.188-0.1336 0.3129-0.1296 0.1068-0.0076 0.2264 0.044 0.3048 0.12s0.1336 0.188 0.1296 0.3128c-0.022 0.1133-0.0736 0.2329-0.1496 0.3113zm0.966 1.387-0.7897 0.7904c-0.152 0.1568-0.4609 0.1616-0.6061-0.0084-0.0784-0.076-0.1336-0.188-0.1296-0.3128 4e-3 -0.1249 0.044-0.2265 0.12-0.3049l0.7898-0.7904c0.076-0.0784 0.188-0.1336 0.3128-0.1296s0.2264 0.044 0.3048 0.12c0.1632 0.1816 0.1616 0.4609-2e-3 0.6357zm7.6546-2.8632c-0.1108 0.1324-0.2937 0.2184-0.4841 0.1976l-0.0296 0.0064c-0.202-0.0029-0.4052-0.0829-0.562-0.2349l-0.1568-0.152-1.0077-1.0062c-0.1568-0.152-0.4065-0.16-0.5585-0.0032s-0.16 0.4064-0.0032 0.5585l1.0077 1.0061c0.1208 0.1288 0.1888 0.3001 0.1796 0.4725 0.0088 0.184-0.0776 0.3576-0.2181 0.4964-0.2692 0.2596-0.7325 0.2668-0.9921-0.0024l-0.9717-0.983c-0.1568-0.152-0.4064-0.16-0.5584-0.0032s-0.1601 0.4065-0.0032 0.5585l0.7544 0.7665c0.2596 0.2692 0.2604 0.7029 0.0092 0.9741l-0.0116 0.018c-0.2693 0.2596-0.7325 0.2668-0.9921-0.0024l-0.6941-0.7021c-0.1568-0.1521-0.4064-0.1601-0.5584-0.0033-0.1521 0.1569-0.1601 0.4065-0.0033 0.5585l0.4949 0.4973c0.1208 0.1288 0.1888 0.3 0.1796 0.4724 0.0088 0.1841-0.0777 0.3577-0.2181 0.4965-0.2692 0.2596-0.7145 0.2784-0.9741 0.0091l-0.6116-0.7509c0.3312-0.4744 0.2973-1.1333-0.1372-1.5661-0.1748-0.1637-0.3908-0.3029-0.6288-0.3289 0.0168-0.0656 0.022-0.1132 0.0092-0.1724 0.0068-0.3269-0.1228-0.6397-0.358-0.8677-0.1632-0.1817-0.4025-0.2849-0.6289-0.3289 0.0168-0.0656 0.022-0.1132 0.0092-0.1724 0.0068-0.3269-0.1228-0.6397-0.358-0.8677-0.2352-0.2281-0.52844-0.3661-0.86688-0.3549-0.05921 0.0128-0.10681 0.0076-0.18402 0.0088-0.0512-0.2368-0.1436-0.4493-0.33641-0.6245-0.47684-0.4857-1.2489-0.4737-1.723-0.0149l-0.43167 0.5117-0.88848-0.5981 2.7613-4.2844 0.66366 0.2749c0.49645 0.218 1.0305 0.18 1.5018-0.0768l0.3476-0.1836c0.3593-0.2016 0.7801-0.2616 1.179-0.2084l0.4644 0.07c-0.2488 0.4257-0.4373 0.9157-0.5485 1.4046-0.1385 0.6497 0.2224 1.3153 0.8732 1.531l0.018 0.0116c0.5429 0.146 1.1158-0.0708 1.4174-0.5388l0.3365-0.5221 0.4604 0.1949c1.1421 0.4813 2.1578 1.2378 2.9391 2.2l1.0536 1.2905c0.018 0.0116 0.018 0.0116 0.0244 0.0412 0.1388 0.1405 0.2068 0.3117 0.2156 0.4957-0.0156 0.1428-0.0904 0.2984-0.2012 0.4309zm0.8209-1.0761c-0.0796-0.1533-0.1592-0.3065-0.28-0.4353l-1.0357-1.279c-0.866-1.0677-1.9781-1.9119-3.2514-2.4268l-0.6997-0.2981c-0.2212-0.0916-0.4812-0.0044-0.6089 0.1936l-0.4757 0.7381c-0.116 0.18-0.3284 0.2724-0.5252 0.222-0.2508-0.0852-0.4153-0.344-0.348-0.6065 0.1164-0.5364 0.3344-1.0329 0.6245-1.4829l0.0464-0.072c0.2552-0.3961 0.7869-0.5885 1.259-0.4116l1.0393 0.3641c0.9557 0.3356 1.9606 0.3973 2.9375 0.1861l2.8013 4.4298-1.4834 0.8785zm4.427-1.4528-1.3354 0.8464c-0.1764 0.1156-0.4208 0.06-0.5365-0.1164l-3.3921-5.3712c-0.0488-0.0824-0.0744-0.2008-0.046-0.2844 0.022-0.11321 0.0864-0.17361 0.1804-0.24042l1.3354-0.84644c0.0528-0.0424 0.1416-0.0616 0.2188-0.0628 0.0296-0.0064 0.0476 0.0052 0.0952 0.01041 0.1132 0.022 0.1737 0.08641 0.2405 0.18043l3.3921 5.3711c0.0488 0.0824 0.0744 0.2008 0.046 0.2845-0.0284 0.0836-0.1044 0.162-0.1984 0.2288z" />
                              <path
                                  d="m23.986 13.99c-0.1824-0.2704-0.5401-0.348-0.7989-0.1836-0.2704 0.1824-0.3481 0.54-0.1837 0.7988 0.1825 0.2705 0.5401 0.3481 0.7989 0.1837 0.2769-0.1528 0.3661-0.5284 0.1837-0.7989z" />
                          </g>
                      </svg>
                  </span> --}}
          <span id="like_count_{{ $question_comment->id }}"> {{ $total_comment_likes }}</span>
        </a>
      </div>
      <div onclick="loadQuestionCommentReply({{ $question_comment->id }})" data-bs-toggle="collapse"
        data-bs-target="#collapsees_reply_{{ $question_comment->id }}" aria-expanded="false"
        aria-controls="collapse_reply" role="button">
        <a class="icon col-auto ms-4">
          <span role="svg" class="">
            <svg class="replay-icon mb-1" width="25" height="17" viewBox="0 0 28 22" fill="none"
              xmlns="http://www.w3.org/2000/svg">
              <path d="M18.7997 6.08203L26 13.3721L18.7997 20.1619" stroke="#7F7F7F" stroke-width="2.2"
                stroke-linecap="round" stroke-linejoin="round" />
              <path d="M24.2456 13.1781L10.7473 13.1441C3.82294 13.0786 2.17939 9.13614 5.74181 2.0111" stroke="#7F7F7F"
                stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </span>
          <span data-total-comment-replies-{{ $question_comment->id }}="{{ $total_comment_replies }}"
            class="total-comments-reply-{{ $question_comment->id }}">{{ $total_comment_replies }}</span>
        </a>
        <span class="mx-1 mx-sm-2 col-auto">|</span>
        <a role="button" class="icon col-auto font-weight-400">Antworten</a>
      </div>
    </div>

  </div>
</div>

<!-- Answer comments -->
<div id="collapsees_reply_{{ $question_comment->id }}" class="collapse">
  <div class="answer-comments-section">

    <!-- load more answers comments Button -->

    {{-- question comment answer --}}
    <div class="answer-comments-container ms-auto">
      <!-- Add New Comment Form -->
      <div role="form" class="add-answer w-100">
        <div class="d-flex">
          <a href="#" class="flex-0 rounded-pill answer-avatar ps-2">
            <?php Helper::profilePicture('', '32px', auth()->user(), 'me-2 pointer-on-hover', ''); ?>
          </a>
          <!-- Input Box ===> You can get the value by JS or Jquery -->
          <textarea name="" id="comment_reply_textarea_{{ $question_comment->id }}" cols="30"
            oninput="auto_grow(this, 32)" class="PostBorderComment d-inline-block px-3"
            style="padding-top: 7px;padding-bottom: 5px;width:100%; height: 32px !important; overflow:hidden; -webkit-appearance: none; border-radius: 30px; font-size: 12px;"
            placeholder="Schreibe eine Antwort..."></textarea>
        </div>

        <div class="d-flex mt-1 mb-2 align-items-center">
          <!-- Submit Button -->
          <button class="btn btn-answer ms-auto" onclick="addQuestionCommentReply({{ $question_comment->id }});">
            Kommentieren
          </button>
        </div>
      </div>
      <div class="w-100 comment-reply-list-{{ $question_comment->id }}"
        id="question_comments_reply_{{ $question_comment->id }}">

      </div>
      {{-- end question comment answer --}}

    </div>


    @if (App\Models\QuestionCommentReply::where('question_comment_id', $question_comment->id)->count() > 0)
      <a role="button" class="load-more mb-2 mt-1 font-weight-700 load-more-reply-{{ $question_comment->id }}"
        onclick="loadMoreCommentReply({{ $question_comment->id }})"
        data-total-comment="{{ App\Models\QuestionCommentReply::where('question_comment_id', $question_comment->id)->count() }}">
        Mehr Antworten anzeigen</a>
    @endif
  </div>
</div>
</div>
