## Ext 扩展器

#### uuid()

生成 uuid v4

- **Return** `UuidInterface`

```php
$uuid = Ext::uuid();

dump($uuid);

// Uuid {#50 ▼
//   #codec: StringCodec {#53 ▼
//     -builder: DefaultUuidBuilder {#52 ▼
//       -converter: DegradedNumberConverter {#51}
//     }
//   }
//   #fields: array:6 [▼
//     "time_low" => "a2bcf1d5"
//     "time_mid" => "2be3"
//     "time_hi_and_version" => "4dc6"
//     "clock_seq_hi_and_reserved" => "8c"
//     "clock_seq_low" => "d4"
//     "node" => "937835a18a8b"
//   ]
//   #converter: DegradedNumberConverter {#51}
// }

dump($uuid->toString());

// "a2bcf1d5-2be3-4dc6-8cd4-937835a18a8b"
```

#### stringy($str = '', $encoding = null)

创建一个Stringy字符串操作工具

```php
Ext::stringy('abc');
```

<table>
    <tr>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#appendstring-string">append</a></td>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#atint-index">at</a></td>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#betweenstring-start-string-end--int-offset">between</a></td>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#camelize">camelize</a></td>
    </tr>
    <tr>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#chars">chars</a></td>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#collapsewhitespace">collapseWhitespace</a></td>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#containsstring-needle--boolean-casesensitive--true-">contains</a></td>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#containsallarray-needles--boolean-casesensitive--true-">containsAll</a></td>
    </tr>
    <tr>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#containsanyarray-needles--boolean-casesensitive--true-">containsAny</a></td>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#countsubstrstring-substring--boolean-casesensitive--true-">countSubstr</a></td>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#dasherize">dasherize</a></td>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#delimitint-delimiter">delimit</a></td>
    </tr>
    <tr>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#endswithstring-substring--boolean-casesensitive--true-">endsWith</a></td>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#endswithanystring-substrings--boolean-casesensitive--true-">endsWithAny</a></td>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#ensureleftstring-substring">ensureLeft</a></td>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#ensurerightstring-substring">ensureRight</a></td>
    </tr>
    <tr>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#firstint-n">first</a></td>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#getencoding">getEncoding</a></td>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#haslowercase">hasLowerCase</a></td>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#hasuppercase">hasUpperCase</a></td>
    </tr>
    <tr>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#htmldecode">htmlDecode</a></td>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#htmlencode">htmlEncode</a></td>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#humanize">humanize</a></td>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#indexofstring-needle--offset--0-">indexOf</a></td>
    </tr>
    <tr>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#indexoflaststring-needle--offset--0-">indexOfLast</a></td>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#insertint-index-string-substring">insert</a></td>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#isalpha">isAlpha</a></td>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#isalphanumeric">isAlphanumeric</a></td>
    </tr>
    <tr>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#isbase64">isBase64</a></td>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#isblank">isBlank</a></td>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#ishexadecimal">isHexadecimal</a></td>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#isjson">isJson</a></td>
    </tr>
    <tr>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#islowercase">isLowerCase</a></td>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#isserialized">isSerialized</a></td>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#isuppercase">isUpperCase</a></td>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#lastint-n">last</a></td>
    </tr>
    <tr>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#length">length</a></td>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#lines">lines</a></td>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#longestcommonprefixstring-otherstr">longestCommonPrefix</a></td>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#longestcommonsuffixstring-otherstr">longestCommonSuffix</a></td>
    </tr>
    <tr>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#longestcommonsubstringstring-otherstr">longestCommonSubstring</a></td>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#lowercasefirst">lowerCaseFirst</a></td>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#padint-length--string-padstr-----string-padtype--right-">pad</a></td>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#padbothint-length--string-padstr----">padBoth</a></td>
    </tr>
    <tr>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#padleftint-length--string-padstr----">padLeft</a></td>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#padrightint-length--string-padstr----">padRight</a></td>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#prependstring-string">prepend</a></td>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#regexreplacestring-pattern-string-replacement--string-options--msr">regexReplace</a></td>
    </tr>
    <tr>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#removeleftstring-substring">removeLeft</a></td>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#removerightstring-substring">removeRight</a></td>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#repeatint-multiplier">repeat</a></td>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#replacestring-search-string-replacement">replace</a></td>
    </tr>
    <tr>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#reverse">reverse</a></td>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#safetruncateint-length--string-substring---">safeTruncate</a></td>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#shuffle">shuffle</a></td>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#slugify-string-replacement-----string-language--en">slugify</a></td>
    </tr>
    <tr>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#sliceint-start--int-end-">slice</a></td>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#splitstring-pattern--int-limit-">split</a></td>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#startswithstring-substring--boolean-casesensitive--true-">startsWith</a></td>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#startswithanystring-substrings--boolean-casesensitive--true-">startsWithAny</a></td>
    </tr>
    <tr>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#stripwhitespace">stripWhitespace</a></td>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#substrint-start--int-length-">substr</a></td>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#surroundstring-substring">surround</a></td>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#swapcase">swapCase</a></td>
    </tr>
    <tr>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#tidy">tidy</a></td>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#titleize-array-ignore">titleize</a></td>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#toascii-string-language--en--bool-removeunsupported--true-">toAscii</a></td>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#toboolean">toBoolean</a></td>
    </tr>
    <tr>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#tolowercase">toLowerCase</a></td>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#tospaces-tablength--4-">toSpaces</a></td>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#totabs-tablength--4-">toTabs</a></td>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#totitlecase">toTitleCase</a></td>
    </tr>
    <tr>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#touppercase">toUpperCase</a></td>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#trim-string-chars">trim</a></td>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#trimleft-string-chars">trimLeft</a></td>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#trimright-string-chars">trimRight</a></td>
    </tr>
    <tr>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#truncateint-length--string-substring---">truncate</a></td>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#underscored">underscored</a></td>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#uppercamelize">upperCamelize</a></td>
        <td><a target="_blank" href="https://github.com/danielstjules/Stringy#uppercasefirst">upperCaseFirst</a></td>
    </tr>
</table>

> 更多操作可参考 [danielstjules/Stringy](https://github.com/danielstjules/Stringy)