# CHANGELOG for 0.x
This changelog references the relevant changes done in 0.x versions.


## v0.2.0
* #1: [Type] Add `isMessage` method to interface for simple check to determine if fields contain a nested message.
* #1: [MessageType] Impements `anyOfClassNames` so a field can support an array of possible messages.
* #2: [Type] Removed `allowedInSetOrList` and added `allowedInSet` since all field rules except `set` support all types.
* [Message] Removed `removeFromList` method from interface and abstract message.
* [Message] Added `removeFromListAt` method to interface and abstract message.
* [MessageRef], [MessageRefType] Added new class for creating links/references to other messages.
* Removed all correl_id fields from extensions and hasCorrelId, getCorrelId, setCorrelId, in favor of `correlator`.
* Killed all `Extension` classes and converted them to `Mixins`.
* [Schema] Eliminated schema extension capability, must use mixins now as `Schema` is now marked as final.
* [Schema] `create` method removed, use the constructor instead.
* [Field] When the field type is a `Message` the className option can be a class or interface.
* Added formats `slug` and `dated-slug` options for string type.
* Added [IdentifierType] which supports class names for explicit identifiers.


## v0.1.0
* Initial version.
