const path = require('path')
const aliases = require('./alias')
const resolve = p => {
  const base = p.split('/')[0]
  console.log(base)
  if (aliases[base]) {
    console.log(aliases[base])
    console.log(path.resolve(aliases[base], p.slice(base.length + 1)));
    return path.resolve(aliases[base], p.slice(base.length + 1))
  } else {
    console.log(path.resolve(__dirname, '../', p));
    return path.resolve(__dirname, '../', p)
  }
}




const builds = {
    // Runtime only (CommonJS). Used by bundlers e.g. Webpack & Browserify
    'web-runtime-cjs-dev': {
      entry: resolve('web/entry-runtime.js'),
      dest: resolve('dist/vue.runtime.common.dev.js'),
      format: 'cjs',
      env: 'development',
      
    },
    'web-runtime-cjs-prod': {
      entry: resolve('web/entry-runtime.js'),
      dest: resolve('dist/vue.runtime.common.prod.js'),
      format: 'cjs',
      env: 'production'
    }
  }


