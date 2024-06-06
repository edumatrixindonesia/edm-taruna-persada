<div class="parent-faq">
    <h1 class="title-faq">&nbsp; Frequently <br />&nbsp; Asked Questions</h1>
    <main>
        <div class="accordion">
            @foreach($faqs as $faq)
            <div class="accordion-item">
                <div class="accordion-item-header">
                    <span class="accordion-item-header-title">{{ $faq['question'] }}</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down accordion-item-header-icon">
                        <path d="m6 9 6 6 6-6" />
                    </svg>
                </div>
                <div class="accordion-item-description-wrapper">
                    <div class="accordion-item-description">
                        <hr />
                        <p>
                            {{ $faq['answer'] }}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </main>
</div>