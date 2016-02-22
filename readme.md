# Fools Tweet Ipsum (API)
What better source of text for random placeholder than twitter accounts responsible for some of the most foolish things
to be shared with the general public?

Fools Tweet Ipsum gathers the most recent tweets from a sampling of these fine characters and creates a text generator
based on their words of wisdom.

# Use
  
`/categories` - get a list of available categories to use.
    
    {
      data: [
        "political",
        "musicians",
        "actors"
      ]
    }
    
`/feeds` - get a list of available feeds to use. NOTE:  When using feeds, use the key not value.  Values stored for
labeling purposes.
    
    {
      data: {
        says_drake: "Stuff Drake Says",
        stuffdrakedoes: "Stuff Drake Does",
        kanyewest: "Kanye West",
        bobatl: "B.o.B",
        angeltilalove: "Tila Tequila",
        sarahpalinusa: "Sarah Palin",
        realdonaldtrump: "Donald J. Trump",
        officialjaden: "Jaden Smith",
        snookie: "Nicole Polizzi",
        thetweetofgod: "God",
        big_ben_clock: "Big Ben",
        senjohnmccain: "John McCain",
        rupertmurdoch: "Rupert Murdoch"
      }
    }

## Words
     
`v1/, v1/word` - returns a single word from a random feed.
    
    {
      data: "Good"
    }

`v1/words` - returns 3 words from a random feed

    {
      data: [
        "having",
        "a",
        "great"
      ],
      concatenated: "having a great"
    }

`v1/words/{wordCount}` - returns {wordCount} words from a random feed

    {
      data: [
        "his",
        "dislocated",
        "shoulder",
        "Doesn't",
        "hurt"
      ],
      concatenated: "his dislocated shoulder Doesn't hurt"
    }

`v1/words/{wordCount}/category/{category}` - returns {wordCount} words from a feed within the {category} specified.

    {
      data: [
        "Hello",
        "BoyanSlat",
        "We",
        "Should",
        "Talk"
      ],
      concatenated: "Hello BoyanSlat We Should Talk"
    }

`v1/words/{wordCount}/feed/{feedName}` - returns {wordCount} words from the specified {feedName}.

    {
      data: [
        "Drake",
        "looks",
        "up",
        "from",
        "his"
      ],
      concatenated: "Drake looks up from his"
    }

## Sentences
     
`v1/sentence` - returns a sentence (tweet) from a random feed

    {
      data: "Oh! It's ok. Winning all the time isn't everything. The love between my daughter and I is! So #IWin anyway hehehe https://t.co/wVJOuuspFD"
    }
     
`v1/sentences` - returns 3 sentences (tweets) from a random feed

    {
      data: [
        "US race relations bad enough without Clinton, Sanders trolling for black votes trying to criminalise cops. Worst type of pandering.",
        "Soft left softball from Clinton donor Woodruff, last night's CNN-PBS non-debate.",
        "Of course Hillary's agent sought top dollar fees. Why lie? What she told Wall St friends IS relevant and we will never be told."
      ],
      concatenated: "US race relations bad enough without Clinton, Sanders trolling for black votes trying to criminalise cops. Worst type of pandering. Soft left softball from Clinton donor Woodruff, last night's CNN-PBS non-debate. Of course Hillary's agent sought top dollar fees. Why lie? What she told Wall St friends IS relevant and we will never be told."
    }


`v1/sentences/{sentenceCount}` - returns {sentenceCount} sentences (tweets) from a random feed

    {
      data: [
        "BONG BONG BONG BONG BONG",
        "BONG BONG BONG BONG BONG",
        "BONG BONG BONG BONG BONG BONG",
        "BONG BONG BONG BONG BONG BONG BONG BONG"
      ],
      concatenated: "BONG BONG BONG BONG BONG BONG BONG BONG BONG BONG BONG BONG BONG BONG BONG BONG BONG BONG BONG BONG BONG BONG BONG BONG"
    }

`v1/sentences/{sentenceCount}/category/{category}` - returns {sentenceCount} sentences (tweets) from a feed within the {category} specified.

    {
      data: [
        "The cities in the background are approx. 16miles apart... where is the curve ? please explain this https://t.co/YCJVBdOWX7",
        "11:11, Drake can't decide what he wants to wish for, he stays up 12 hours thinking and waiting.",
        "Hey Nicolas Ghesquiere I grew up on Tron too… Let’s be best friends!!!",
        "Her son just got in a really good school and his textbooks are like $400 dollars each …"
      ],
      concatenated: "The cities in the background are approx. 16miles apart... where is the curve ? please explain this https://t.co/YCJVBdOWX7 11:11, Drake can't decide what he wants to wish for, he stays up 12 hours thinking and waiting. Hey Nicolas Ghesquiere I grew up on Tron too… Let’s be best friends!!! Her son just got in a really good school and his textbooks are like $400 dollars each …"
    }

`v1/sentences/{sentenceCount}/feed/{feedName}` - returns {sentenceCount} sentences (tweets) from the specified {feedName}.

    {
      data: [
        "LAX check-in. "Any excess baggage?" an attendant asks. Drake puts his hand over his heart but shakes his head. "This right here," he thinks.",
        "2002. High school Biology class. Human Anatomy. "All of this inside me, and yet I feel so empty", thinks Drake as he takes notes.",
        "The snow begins to fall as Drake peers longingly through a coffee shop window. He catches his reflection and doesn't even recognize himself.",
        "Drake is asked by a young boy, "which came first, the chicken or the egg?" Drake responds, "She comes first, she always comes first.""
      ],
      concatenated: "LAX check-in. "Any excess baggage?" an attendant asks. Drake puts his hand over his heart but shakes his head. "This right here," he thinks. 2002. High school Biology class. Human Anatomy. "All of this inside me, and yet I feel so empty", thinks Drake as he takes notes. The snow begins to fall as Drake peers longingly through a coffee shop window. He catches his reflection and doesn't even recognize himself. Drake is asked by a young boy, "which came first, the chicken or the egg?" Drake responds, "She comes first, she always comes first.""
    }


 
## Paragraphs

`v1/paragraph` - returns a paragraph made up of 3 sentences from a random feed.

    {
      data: "she’s giving everything she has to make sure her son has a better future… Imagine if the people I named went to high school 2gthr and had a project to do for school… Season 4 begins. Première Vision https://t.co/LAlvRnlUgG"
    }

`v1/paragraphs` - returns 3 paragraphs made up of 3 sentences each from a random feed.

    {
      data: [
        "If justice is blind then it's somehow developed the capacity to hear color. David Bowie was the God I always wanted to be. Justice.",
        "Steve Harvey just made #MissUniverse2015 more of a joke than it already was, which in theory should not be possible. I deeply regret most of you. I FORGOT JUNIOR'S BIRTHDAY!!!",
        "I just hate all these people. #GOPDebate Well I don't believe in you either. He who knows, does not speak. He who speaks, does not know. Shut up, is what I'm saying."
      ],
      concatenated: "If justice is blind then it's somehow developed the capacity to hear color. David Bowie was the God I always wanted to be. Justice. Steve Harvey just made #MissUniverse2015 more of a joke than it already was, which in theory should not be possible. I deeply regret most of you. I FORGOT JUNIOR'S BIRTHDAY!!! I just hate all these people. #GOPDebate Well I don't believe in you either. He who knows, does not speak. He who speaks, does not know. Shut up, is what I'm saying."
    }

`v1/paragraphs/{paragraphCount}` - returns {paragraphCount} paragraphs made up of 3 sentences each from a random feed.

    {
      data: [
        ""@micah_micahk: @realDonaldTrump @blackan @DanScavino this veteran voted for Trump in TX early voting! https://t.co/DTtUvc59NJ" Remember that Marco Rubio is very weak on illegal immigration. South Carolina needs strength as illegals and Syrians pour in. Don't allow it South Carolina voters have the future of our country in their hands. Vote now (today), and MAKE AMERICA GREAT AGAIN!",
        ""@EricTrump: Nevada we are on our way! #VoteTrumpNV #Trump2016 Caucus locator: https://t.co/aUSzSnOzlm https://t.co/bCRelzywxk" South Carolina voters have the future of our country in their hands. Vote now (today), and MAKE AMERICA GREAT AGAIN! "@BirgitOlsen1: @realDonaldTrump @Justice41ca @Vote_For_Trump EVERYBODY ON TWITTER GET OUT TO VOTE FOR TRUMP TODAY IN SOUTH CAROLINA""
      ],
      concatenated: ""@micah_micahk: @realDonaldTrump @blackan @DanScavino this veteran voted for Trump in TX early voting! https://t.co/DTtUvc59NJ" Remember that Marco Rubio is very weak on illegal immigration. South Carolina needs strength as illegals and Syrians pour in. Don't allow it South Carolina voters have the future of our country in their hands. Vote now (today), and MAKE AMERICA GREAT AGAIN! "@EricTrump: Nevada we are on our way! #VoteTrumpNV #Trump2016 Caucus locator: https://t.co/aUSzSnOzlm https://t.co/bCRelzywxk" South Carolina voters have the future of our country in their hands. Vote now (today), and MAKE AMERICA GREAT AGAIN! "@BirgitOlsen1: @realDonaldTrump @Justice41ca @Vote_For_Trump EVERYBODY ON TWITTER GET OUT TO VOTE FOR TRUMP TODAY IN SOUTH CAROLINA""
    }

`v1/paragraphs/{paragraphCount}/sentences/{sentenceCount}` -
  returns {paragraphCount} paragraphs made up of {sentenceCount} sentences each from a random feed.
  
    {
      data: [
        "Hillary:"When I took those speaking fees I did not know I would be running for president!" Oh yeah!! Tech tax breaks facilitated by politicians easily awed by Valley ambassadors like Google chairman Schmidt eg, posh boys in Downing St.@ Soft left softball from Clinton donor Woodruff, last night's CNN-PBS non-debate. Hillary email breaches get very serious, even though certain Russia, China, Israel had the server hacked full time for years.",
        "Watch Hillary's candidacy sink and sink. Nobody buying and more big trouble coming on emails. Dems looking for replacement. John Kerry? 24 hours and many influential Republicans see Trump inevitable and get ready to switch. United by horror of Hillary whose campaign staggers Sadly UK's Independent print paper closes after about 30 years. Any loss of diversity bad. UK-EU negotiations meaningless without complete control of borders. Must be able to choose immigrants.",
        "Cameron's EU non-deal shocks UK opinion. Now he's rumoured to be begging cabinet colleagues to put aside beliefs. Google et al broke no tax laws. Now paying token amounts for p r purposes. Won't work. Need strong new laws to pay like the rest of us. Republican candidates must be looking forward to tonight's debate. Speaking without Donald getting all attention. Aim for independents. Christie the tough bullying prosecutor. Not much on big issues. Kasich the safe moderate, everyone's Vice President. Carson also best yet."
      ],
      concatenated: "Hillary:"When I took those speaking fees I did not know I would be running for president!" Oh yeah!! Tech tax breaks facilitated by politicians easily awed by Valley ambassadors like Google chairman Schmidt eg, posh boys in Downing St.@ Soft left softball from Clinton donor Woodruff, last night's CNN-PBS non-debate. Hillary email breaches get very serious, even though certain Russia, China, Israel had the server hacked full time for years. Watch Hillary's candidacy sink and sink. Nobody buying and more big trouble coming on emails. Dems looking for replacement. John Kerry? 24 hours and many influential Republicans see Trump inevitable and get ready to switch. United by horror of Hillary whose campaign staggers Sadly UK's Independent print paper closes after about 30 years. Any loss of diversity bad. UK-EU negotiations meaningless without complete control of borders. Must be able to choose immigrants. Cameron's EU non-deal shocks UK opinion. Now he's rumoured to be begging cabinet colleagues to put aside beliefs. Google et al broke no tax laws. Now paying token amounts for p r purposes. Won't work. Need strong new laws to pay like the rest of us. Republican candidates must be looking forward to tonight's debate. Speaking without Donald getting all attention. Aim for independents. Christie the tough bullying prosecutor. Not much on big issues. Kasich the safe moderate, everyone's Vice President. Carson also best yet."
    }
  
`v1/paragraphs/{paragraphCount}/sentences/{sentenceCount}/category/{category}` -
  returns {paragraphCount} paragraphs made up of {sentenceCount} sentences each from a feed within the {category} specified.
  
    {
      data: [
        "2am. Staring out of a window Drake presses his fingers against the glass. "I wish the other hand was real," he sighs. http://t.co/uOPZEZTz8f January 1. 12:01 A.M. A man shouts "New year new me!" Drake smiles to himself and thinks, "Maybe the new me will be the one for her." Shopping mall. Drake watches as children sit on Santa's lap. "What do you want for Christmas, young boy?" "Another chance," Drake thinks. After his fight with Diddy, Drake is seemingly unfazed by his dislocated shoulder. "Doesn't hurt as much as a broken heart," he thinks.",
        "Drake hears a notification and rushes to answer. Trivia crack says it misses him. He thinks, "Why couldn't it be her?" "Sad, but one day our kids will have to visit museums to see what a lady looks like " - 3 stacks she’s giving everything she has to make sure her son has a better future… A second-hand book store. Drake finds a copy of Twilight. A sticker on it reads "USED". He looks around, then leans in. "You too?" he says.",
        "Drake would come by and just help, no strings. Future also came by to write. We all got new shit together that's gonna drop soon. Drake pushes B to stop his Bulbasaur from evolving. He leans in close to his Game Boy. "You don't have to change for me," he whispers. Drake looks up at the sun. He squints as the light shines into his eyes. "She would've made this day brighter." He whispers. Drake is about to take the redemption shot in beer pong. He sighs, then walks away. "If she didnt give me a second chance, why should they?""
      ],
      concatenated: "2am. Staring out of a window Drake presses his fingers against the glass. "I wish the other hand was real," he sighs. http://t.co/uOPZEZTz8f January 1. 12:01 A.M. A man shouts "New year new me!" Drake smiles to himself and thinks, "Maybe the new me will be the one for her." Shopping mall. Drake watches as children sit on Santa's lap. "What do you want for Christmas, young boy?" "Another chance," Drake thinks. After his fight with Diddy, Drake is seemingly unfazed by his dislocated shoulder. "Doesn't hurt as much as a broken heart," he thinks. Drake hears a notification and rushes to answer. Trivia crack says it misses him. He thinks, "Why couldn't it be her?" "Sad, but one day our kids will have to visit museums to see what a lady looks like " - 3 stacks she’s giving everything she has to make sure her son has a better future… A second-hand book store. Drake finds a copy of Twilight. A sticker on it reads "USED". He looks around, then leans in. "You too?" he says. Drake would come by and just help, no strings. Future also came by to write. We all got new shit together that's gonna drop soon. Drake pushes B to stop his Bulbasaur from evolving. He leans in close to his Game Boy. "You don't have to change for me," he whispers. Drake looks up at the sun. He squints as the light shines into his eyes. "She would've made this day brighter." He whispers. Drake is about to take the redemption shot in beer pong. He sighs, then walks away. "If she didnt give me a second chance, why should they?""
    }
  
`v1/paragraphs/{paragraphCount}/sentences/{sentenceCount}/feed/{feedName}` -
  returns {paragraphCount} paragraphs made up of {sentenceCount} sentences each from the specified {feedName}.
  
    {
      data: [
        ""What a catch from Chris Matthews!" the Super Bowl commentator says. In his armchair, Drake sighs. "Like me catching feelings," he thinks. A second-hand book store. Drake finds a copy of Twilight. A sticker on it reads "USED". He looks around, then leans in. "You too?" he says. January 1. 12:01 A.M. A man shouts "New year new me!" Drake smiles to himself and thinks, "Maybe the new me will be the one for her." Toronto. Traffic. Drake is singing along to the radio. "I got 99 problems but..." He pauses. "I wish she was still one," he whispers.",
        "1:03 AM. An officer is called to a reported break-in. "Is anything missing?" he asks. Drake stares out of a broken window and sighs. "Her." A waitress drops a tray of dishes. Her eyes puffy from tears. Drake kneels beside her "Were gonna pick up these broken pieces together, ok?" A week has passed. Drake sits in his armchair in darkness, contemplating as his phone lights up his face. "Where are we?" he texts Madonna. Gym. Noon. As Drake goes through his workout routine, he skips the treadmill. "I know what it's like to be walked all over," he thinks.",
        "LAX check-in. "Any excess baggage?" an attendant asks. Drake puts his hand over his heart but shakes his head. "This right here," he thinks. Drake gazes at his reflection in the lake; it looks sad. "How can I find her," he thinks, skimming a stone, "when I can't even find myself?" 11:11, Drake can't decide what he wants to wish for, he stays up 12 hours thinking and waiting. Drake's lip begins to quiver as he watches the Mayweather v Pacquiao highlights. "I wish you hugged me like that when we fight," he weeps."
      ],
      concatenated: ""What a catch from Chris Matthews!" the Super Bowl commentator says. In his armchair, Drake sighs. "Like me catching feelings," he thinks. A second-hand book store. Drake finds a copy of Twilight. A sticker on it reads "USED". He looks around, then leans in. "You too?" he says. January 1. 12:01 A.M. A man shouts "New year new me!" Drake smiles to himself and thinks, "Maybe the new me will be the one for her." Toronto. Traffic. Drake is singing along to the radio. "I got 99 problems but..." He pauses. "I wish she was still one," he whispers. 1:03 AM. An officer is called to a reported break-in. "Is anything missing?" he asks. Drake stares out of a broken window and sighs. "Her." A waitress drops a tray of dishes. Her eyes puffy from tears. Drake kneels beside her "Were gonna pick up these broken pieces together, ok?" A week has passed. Drake sits in his armchair in darkness, contemplating as his phone lights up his face. "Where are we?" he texts Madonna. Gym. Noon. As Drake goes through his workout routine, he skips the treadmill. "I know what it's like to be walked all over," he thinks. LAX check-in. "Any excess baggage?" an attendant asks. Drake puts his hand over his heart but shakes his head. "This right here," he thinks. Drake gazes at his reflection in the lake; it looks sad. "How can I find her," he thinks, skimming a stone, "when I can't even find myself?" 11:11, Drake can't decide what he wants to wish for, he stays up 12 hours thinking and waiting. Drake's lip begins to quiver as he watches the Mayweather v Pacquiao highlights. "I wish you hugged me like that when we fight," he weeps."
    }

# Fools Tweet Ipsum created with:
# Lumen PHP Framework

[![Build Status](https://travis-ci.org/laravel/lumen-framework.svg)](https://travis-ci.org/laravel/lumen-framework)
[![Total Downloads](https://poser.pugx.org/laravel/lumen-framework/d/total.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/lumen-framework/v/stable.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/lumen-framework/v/unstable.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![License](https://poser.pugx.org/laravel/lumen-framework/license.svg)](https://packagist.org/packages/laravel/lumen-framework)

Laravel Lumen is a stunningly fast PHP micro-framework for building web applications with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Lumen attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as routing, database abstraction, queueing, and caching.

## Official Documentation

Documentation for the framework can be found on the [Lumen website](http://lumen.laravel.com/docs).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Lumen framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
