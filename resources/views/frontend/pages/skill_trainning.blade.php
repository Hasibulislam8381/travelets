<section class="skill-section">
    <div class="container-fluid px-4">

        <h2 class="section-title">Skill Training*</h2>
        <p class="section-desc">Empowering women across Bangladesh through safe travel, skill-building, secure stays,
            and inclusive growth programs — created by women, for women.</p>

        <div class="row g-3">

            <!-- Left: Skill List -->
            <div class="col-lg-4 col-md-5">
                <div class="skill-list-panel">
                    @foreach ($skillTrainings as $index => $skill)
                        <div class="skill-item {{ $index === 0 ? 'active' : '' }}" data-skill="skill-{{ $skill->id }}">
                            <div class="skill-item-left">
                                @if ($skill->category->icon)
                                    <i class="fa {{ $skill->category->icon }} skill-item-icon"
                                        style="color:#fff;font-size:16px;width:20px;"></i>
                                @else
                                    <svg class="skill-item-icon" viewBox="0 0 20 20" fill="none">
                                        <path d="M10 3v14M3 10h14" stroke="#fff" stroke-width="1.2"
                                            stroke-linecap="round" />
                                        <circle cx="10" cy="10" r="7" stroke="#fff" stroke-width="1.2" />
                                    </svg>
                                @endif
                                <span class="skill-item-name">{{ $skill->title }}</span>
                            </div>
                            <div class="skill-arrow">
                                <svg viewBox="0 0 12 12" fill="none">
                                    <path d="M3 6h6M7 4l2 2-2 2" stroke="#fff" stroke-width="1.2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Right: Detail Panel -->
            <div class="col-lg-8 col-md-7">
                <div class="skill-detail-panel">
                    @foreach ($skillTrainings as $index => $skill)
                        <div class="skill-detail {{ $index === 0 ? 'active' : '' }}"
                            id="detail-skill-{{ $skill->id }}">

                            <div class="detail-img-wrap">
                                <img src="{{ $skill->thumbnail ? Storage::url($skill->thumbnail) : 'https://images.unsplash.com/photo-1541625602330-2277a4c46182?w=800&q=80' }}"
                                    alt="{{ $skill->title }}">
                                @if (!empty($skill->meta['satisfied_count']))
                                    <div class="satisfied-badge">
                                        <div class="satisfied-avatars">
                                            <span><img src="https://i.pravatar.cc/22?img={{ $index + 1 }}"
                                                    alt=""></span>
                                            <span><img src="https://i.pravatar.cc/22?img={{ $index + 2 }}"
                                                    alt=""></span>
                                        </div>
                                        {{ $skill->meta['satisfied_count'] }}+ Satisfied People
                                    </div>
                                @endif
                            </div>

                            <div class="detail-body">
                                <h3 class="detail-title">{{ $skill->title }}</h3>
                                <p class="detail-desc">{{ $skill->short_description }}</p>

                                <div class="detail-meta">
                                    @if (!empty($skill->meta['sessions']))
                                        <div class="meta-group">
                                            <label>Available Sessions</label>
                                            <div class="meta-tags">
                                                @foreach ($skill->meta['sessions'] as $session)
                                                    <span class="meta-tag">+ {{ $session }}</span>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif

                                    @if (!empty($skill->meta['levels']))
                                        <div class="meta-group">
                                            <label>Levels Offered</label>
                                            <div class="meta-tags">
                                                @foreach ($skill->meta['levels'] as $level)
                                                    <span class="level-tag">
                                                        <span class="level-dot"></span> {{ $level }}
                                                    </span>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                <div class="detail-footer">
                                    <div class="detail-price">
                                        ৳{{ number_format($skill->price) }} <span>/ Monthly</span>
                                    </div>
                                    <a href="{{ route('tour-detail', $skill->slug) }}" class="register-btn">Register
                                        Now</a>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</section>

@push('scripts')
    <script>
        document.querySelectorAll('.skill-item').forEach(item => {
            item.addEventListener('click', function() {
                document.querySelectorAll('.skill-item').forEach(i => i.classList.remove('active'));
                this.classList.add('active');

                document.querySelectorAll('.skill-detail').forEach(d => d.classList.remove('active'));

                const target = this.dataset.skill;
                document.getElementById('detail-' + target).classList.add('active');
            });
        });
    </script>
@endpush
