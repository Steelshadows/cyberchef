const { writeFileSync } = require('fs')
const { pages } = require('./questions.json')

let data = '$questions = array (\n'

for (const page of pages) {
    if (page.elements) {
        for (const element of page.elements) {
            if (!element.name.startsWith('question') && element.title) {
                data += `"${element.name}" => "${element.title.nl ?? element.title}",\n`
            }
        }
    }
}

data += ');'

console.log(data)